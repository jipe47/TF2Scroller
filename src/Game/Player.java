package Game;

import java.awt.Graphics2D;

import Physic.Entity;

public class Player extends Entity {
	
	public Player()
	{
		this.setWidth(50);
		this.setHeight(40);
		this.setX(400);
		this.setY(30);
		this.setStatic(false);
	}
	
	public void moveLeft()
	{
		this.setDirection(Entity.LEFT);
		this.setDx(10);
	}
	public void moveRight()
	{
		this.setDirection(Entity.RIGHT);
		this.setDx(10);
	}
	public void moveUp()
	{
		if(this.getDy() == 0)
			this.setDdy(20);
	}
	public void moveDown()
	{
		//this.setDy(-60);
	}
	public void stop()
	{
		this.setDx(0);
		this.setDy(0);
	}
}
