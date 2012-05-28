package Physic;

import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.Image;
import Display.GameColor;

public abstract class Entity {
		
	public static int uid_counter = 0;
	
	public final static int LEFT = -1;
	public final static int RIGHT = 1;
	
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
		Color colors[] = {GameColor.blue, GameColor.green, GameColor.red, GameColor.black, GameColor.white};
		int nbr_color = 5;
		
		//Random r = new Random();
		//int c = Math.abs(r.nextInt())%nbr_color; // Brain breaker
		int c = 0;
		
		int texture_width = img.getWidth(null);
		int texture_height = img.getHeight(null);
		
		g2d.setColor(GameColor.red);
		g2d.drawOval(x + offset_x, y + offset_y, 10, 10);
		g2d.drawOval(x + offset_x + width, y + offset_y + height, 10, 10);
		
		int r_x = 0;
		int r_y = 0;
		
		while(r_x < width)
		{
			r_y = 0;
			while(r_y < height)
			{
				g2d.setColor(colors[c]);
				
				int dest_x = r_x + x + offset_x;
				int dest_y = r_y + y + offset_y;
				int dest_width = Math.min(texture_width, width - r_x);
				int dest_height = Math.min(texture_height, height - r_y);
				g2d.fillRect(dest_x, dest_y, dest_width, dest_height);
				g2d.drawImage(img, dest_x, dest_y, dest_x + dest_width, dest_y + dest_height, 0, 0, dest_width, dest_height, null);
			
				c = (c + 1) % nbr_color;
				r_y += texture_height;
			}
			
			r_x += texture_width;
		}
		
		g2d.setColor(GameColor.black);
		g2d.drawRect(x + offset_x, y + offset_y, width, height);
	}
}
