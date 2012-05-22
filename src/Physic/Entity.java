package Physic;

import java.awt.Graphics2D;

import Display.GameColor;

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
	
	public void render(Graphics2D g2d)
	{
		// Drawing collision rectangle and its center
		drawUid(g2d);
		g2d.setColor(GameColor.blue);
		g2d.fillOval(cx, cy, 5, 5);
		g2d.drawRect(x, y, width, height);
		
		g2d.setColor(GameColor.red);
		
		// Drawing speed vector
		g2d.drawLine(cx, cy, cx+dx*direction, cy+dy*direction);
	}
	protected void drawUid(Graphics2D g2d)
	{
		g2d.setColor(GameColor.red);
		g2d.drawString(String.valueOf(getUid()) + "("+String.valueOf(x)+","+String.valueOf(y)+")", x, y);
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
	
	public void drawCollision(Entity e, Graphics2D g2d)
	{
		if(!this.collide(e))
			return;
		
		if(onLeftOf(e))
			drawCross(x + width, cy, g2d);
		if(onRightOf(e))
			drawCross(x, cy, g2d);
		if(onTopOf(e))
			drawCross(cx, y + height, g2d);
		if(onBottomOf(e))
			drawCross(cx, y, g2d);
	}
	
	private void drawCross(int x, int y, Graphics2D g2d)
	{
		g2d.setColor(GameColor.red);
		g2d.drawLine(x - 10, y - 10, x + 10, y + 10);
		g2d.drawLine(x + 10, y - 10, x - 10, y + 10);
	}
	
}
