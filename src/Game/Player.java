package Game;

import Physic.Entity;

public class Player extends Entity {
	
	public Player()
	{
		this.setWidth(50);
		this.setHeight(40);
		this.setX(400);
		this.setY(30);
		this.setStatic(false);
		this.setMaxDx(30);
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
			this.setDdy(20);
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
