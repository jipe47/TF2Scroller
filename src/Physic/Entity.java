package Physic;

import java.awt.AlphaComposite;
import java.awt.Color;
import java.awt.Composite;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.GraphicsConfiguration;
import java.awt.GraphicsDevice;
import java.awt.GraphicsEnvironment;
import java.awt.HeadlessException;
import java.awt.Image;
import java.awt.Paint;
import java.awt.Rectangle;
import java.awt.TexturePaint;
import java.awt.Transparency;
import java.awt.image.BufferedImage;

import Display.GameColor;
import Game.Debug;

public abstract class Entity {
		
	public static int uid_counter = 0;
	
	public static final int LEFT = -1;
	public static final int RIGHT = 1;
	
	protected int maxDx = 9999;

	protected int x, y, dx, dy, ddx, ddy, cx, cy;
	protected int direction;
	protected int width, height, hWidth, hHeight;
	protected boolean collide;
	protected boolean isStatic;
	protected int uid;
	
	public Entity()
	{
		uid = uid_counter;
		uid_counter++;
	}

	public int getUid() {
		return uid;
	}

	public int getX() {
		return x;
	}

	public void setX(int x) {
		this.x = x;
		this.cx = x + (int)(width / 2);
	}

	public int getY() {
		return y;
	}

	public int getCx() {
		return cx;
	}

	public void setCx(int cx) {
		this.cx = cx;
	}

	public int getCy() {
		return cy;
	}

	public void setCy(int cy) {
		this.cy = cy;
	}

	public void setY(int y) {
		this.y = y;
		this.cy = y + (int)(height / 2);
	}
	
	public int getDx() {
		return dx;
	}

	public void setDx(int dx) {
		this.dx = dx;
	}

	public int getMaxDx() {
		return maxDx;
	}

	public void setMaxDx(int maxDx) {
		this.maxDx = maxDx;
	}

	public int getDy() {
		return dy;
	}

	public void setDy(int dy) {
		this.dy = dy;
	}

	public int getDdx() {
		return ddx;
	}

	public void setDdx(int ddx) {
		this.ddx = ddx;
	}

	public int getDdy() {
		return ddy;
	}

	public void setDdy(int ddy) {
		this.ddy = ddy;
	}

	public int getWidth() {
		return width;
	}

	public void setWidth(int width) {
		this.width = width;
		this.hWidth = (int) width / 2;
	}

	public int getHeight() {
		return height;
	}

	public void setHeight(int height) {
		this.height = height;
		this.hHeight = (int) height / 2;
	}

	public int gethWidth() {
		return hWidth;
	}

	public int gethHeight() {
		return hHeight;
	}

	public boolean isCollide() {
		return collide;
	}

	public void setCollide(boolean collide) {
		this.collide = collide;
	}

	public boolean isStatic() {
		return isStatic;
	}

	public void setStatic(boolean isStatic) {
		this.isStatic = isStatic;
	}
	
	public int getDirection() {
		return direction;
	}

	public void setDirection(int direction) {
		this.direction = direction;
	}
	
	public void render(Graphics2D g2d, int offset_x, int offset_y)
	{
		// Drawing collision rectangle and its center
		drawUid(g2d, offset_x, offset_y);
		g2d.setColor(GameColor.blue);
		g2d.fillOval(cx + offset_x, cy + offset_y, 5, 5);
		g2d.drawRect(x + offset_x, y + offset_y, width, height);
		
		g2d.setColor(GameColor.red);
		
		// Drawing speed vector
		g2d.drawLine(cx + offset_x, cy + offset_y, cx+dx*direction + offset_x, cy+dy*direction + offset_y);
	}
	protected void drawUid(Graphics2D g2d, int offset_x, int offset_y)
	{
		g2d.setColor(GameColor.red);
		g2d.drawString(String.valueOf(getUid()) + "("+String.valueOf(x)+","+String.valueOf(y)+")", x + offset_x, y + offset_y);
	}
	
	public boolean collide(Entity e)
	{
		return (Math.abs(this.cx - e.cx) - (this.hWidth + e.hWidth)) < 0 &&
				(Math.abs(this.cy - e.cy) - (this.hHeight + e.hHeight)) < 0;
	}
	
	public boolean onLeftOf(Entity e)
	{
		return this.x < e.x && this.y + this.height > e.y + 1 && this.y < e.y + e.height - 1;
	}
	
	public boolean onRightOf(Entity e)
	{
		return this.x > e.x && this.y + this.height > e.y + 1 && this.y < e.y + e.height - 1;
	}
	
	public boolean onTopOf(Entity e)
	{
		return this.y < e.y && this.x + this.width >= e.x && this.x <= e.x + e.width;
	}
	
	public boolean onBottomOf(Entity e)
	{
		return this.y >= e.y + e.height && this.x + this.width >= e.x && this.x <= e.x + e.width;
	}
	
	public boolean canPassOver(Entity e)
	{
		return !(e.getY() < y) && height - (y - e.getY()) < (0.1 * height);
	}
	
	public void drawCollision(Entity e, Graphics2D g2d, int offset_x, int offset_y)
	{
		if(!this.collide(e))
			return;
		
		if(onLeftOf(e))
			drawCross(x + width + offset_x, cy+ offset_y, g2d);
		if(onRightOf(e))
			drawCross(x+ offset_x, cy+ offset_y, g2d);
		if(onTopOf(e))
			drawCross(cx + offset_x, y + height + offset_y, g2d);
		if(onBottomOf(e))
			drawCross(cx + offset_x, y + offset_y, g2d);
	}
	
	private void drawCross(int x, int y, Graphics2D g2d)
	{
		g2d.setColor(GameColor.red);
		g2d.drawLine(x - 10, y - 10, x + 10, y + 10);
		g2d.drawLine(x + 10, y - 10, x - 10, y + 10);
	}
	
	// From http://www.developpez.net/forums/d821363/java/interfaces-graphiques-java/repeter-image-fond/
	protected void drawTexture(Image img, Graphics2D g2d, int offset_x, int offset_y)
	{
		BufferedImage bufferedImage = toBufferedImage(img);
		TexturePaint texture = new TexturePaint(bufferedImage,new Rectangle(0, 0, bufferedImage.getWidth(), bufferedImage.getHeight()));
		
		Composite c = AlphaComposite.getInstance(AlphaComposite.SRC_OVER, 1.f);
		g2d.setComposite(c);
		g2d.setPaint(texture);
		g2d.fillRect(x + offset_x, y + offset_y, getWidth(), getHeight() );
		 
		c = AlphaComposite.getInstance(AlphaComposite.SRC_OVER, 1.f);
		g2d.setComposite(c);
	}
	
	// From http://www.exampledepot.com/egs/java.awt.image/image2buf.html
	private static BufferedImage toBufferedImage(Image image) {
	    if (image instanceof BufferedImage) {
	        return (BufferedImage)image;
	    }

	    // This code ensures that all the pixels in the image are loaded
	  //  image = new ImageIcon(image).getImage();

	    // Determine if the image has transparent pixels; for this method's
	    // implementation, see Determining If an Image Has Transparent Pixels
	    boolean hasAlpha = true;

	    // Create a buffered image with a format that's compatible with the screen
	    BufferedImage bimage = null;
	    GraphicsEnvironment ge = GraphicsEnvironment.getLocalGraphicsEnvironment();
	    try {
	        // Determine the type of transparency of the new buffered image
	        int transparency = Transparency.OPAQUE;
	        if (hasAlpha) {
	            transparency = Transparency.BITMASK;
	        }

	        // Create the buffered image
	        GraphicsDevice gs = ge.getDefaultScreenDevice();
	        GraphicsConfiguration gc = gs.getDefaultConfiguration();
	        bimage = gc.createCompatibleImage(
	            image.getWidth(null), image.getHeight(null), transparency);
	    } catch (HeadlessException e) {
	        // The system does not have a screen
	    }

	    if (bimage == null) {
	        // Create a buffered image using the default color model
	        int type = BufferedImage.TYPE_INT_RGB;
	        if (hasAlpha) {
	            type = BufferedImage.TYPE_INT_ARGB;
	        }
	        bimage = new BufferedImage(image.getWidth(null), image.getHeight(null), type);
	    }

	    // Copy image to buffered image
	    Graphics g = bimage.createGraphics();

	    // Paint the image onto the buffered image
	    g.drawImage(image, 0, 0, null);
	    g.dispose();

	    return bimage;
	}
}
