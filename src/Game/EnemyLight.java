package Game;

import java.awt.Graphics2D;

import Display.GameColor;

public class EnemyLight extends IAPlayer {

	public EnemyLight()
	{
		this.setWidth(60);
		this.setHeight(70);
		this.setX(400);
		this.setY(100);
		this.setStatic(false);
		this.setMaxDx(10);
		this.setShoot(false);
		this.setDirection(this.RIGHT);
	}
	
	public void render(Graphics2D g2d, int offset_x, int offset_y)
	{
		g2d.setColor(GameColor.orange);
		g2d.drawRect(x + offset_x, y + offset_y, width, height);
	}
}
