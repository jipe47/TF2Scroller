package Game;

import java.awt.Graphics2D;
import java.util.HashMap;

import Display.GameColor;
import Display.Sprite;
import Physic.Entity;

public class Player extends Entity {
	
	protected HashMap<String, Sprite> animations;
	protected boolean shoot;
	
	public Player()
	{
	}
	
	public boolean isShoot() {
		return shoot;
	}

	public void setShoot(boolean shoot) {
		this.shoot = shoot;
	}

	public void render(Graphics2D g2d, int offset_x, int offset_y)
	{
		g2d.setColor(GameColor.green);
		g2d.drawRect(x + offset_x, y + offset_y, width, height);
	}
	
	public void moveLeft()
	{
		this.setDirection(Entity.LEFT);
		this.setDdx(10);
//		Debug.echo("moveLeft");
	}
	public void moveRight()
	{
		this.setDirection(Entity.RIGHT);
		this.setDdx(10);
//		Debug.echo("moveRight");
	}
	public void moveUp()
	{
		if(this.getDdy() == 0)
			this.setDdy(15);
//		Debug.echo("moveUp");
	}
	public void moveDown()
	{
		//this.setDy(-60);
	}
	public void stopDown()
	{
//		Debug.echo("STOP DOWN");
	}
	public void stopUp()
	{
		
	}
	public void stopLeft()
	{
		this.setDx(0);
		this.setDdx(0);
//		Debug.echo("stopLeft");
	}
	public void stopRight()
	{
		this.setDx(0);
		this.setDdx(0);
//		Debug.echo("stopRight");
	}
	public void stop()
	{
		this.setDdx(0);
		//this.setDy(0);
	}
}
