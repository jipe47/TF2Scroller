package Game;

import java.awt.Graphics2D;

import Display.GameColor;

public class EnemyHeavy extends IAPlayer {
	
	public EnemyHeavy()
	{
		this.setWidth(100);
		this.setHeight(100);
		this.setX(600);
		this.setY(100);
		this.setStatic(false);
		this.setMaxDx(10);
		this.setShoot(false);
		this.setDirection(this.RIGHT);
	}
	public void update(Player p) {

	}
	
	public void render(Graphics2D g2d, int offset_x, int offset_y)
	{
		g2d.setColor(GameColor.red);
		g2d.drawRect(x + offset_x, y + offset_y, width, height);
	}
}
