package Game;

import java.awt.Graphics2D;
import java.awt.Image;
import java.util.HashMap;

import Display.Sprite;
import Physic.Entity;

public class Player extends Entity {
	
	private HashMap<String, Sprite> animations;
	private boolean shoot;
	
	public Player()
	{
		this.setWidth(73);
		this.setHeight(84);
		this.setX(100);
		this.setY(100);
		this.setStatic(false);
		this.setMaxDx(10);
		this.setShoot(false);
		this.setDirection(this.RIGHT);
		
		// Loading movement animation
		animations = new HashMap<String, Sprite>();
		animations.put("run_left", new Sprite("run_left_000", 21));
		animations.put("run_right", new Sprite("run_right_000", 21));
		animations.put("run_left_shoot", new Sprite("run_left_shoot_000", 21));
		animations.put("run_right_shoot", new Sprite("run_right_shoot_000", 21));
		animations.put("stand_left", new Sprite("stand_left_000", 37));
		animations.put("stand_right", new Sprite("stand_right_000", 37));
		animations.put("stand_left_shoot", new Sprite("stand_left_shoot_000", 37));
		animations.put("stand_right_shoot", new Sprite("stand_right_shoot_000", 37));
		
		//this.run_left = new Sprite("run_left_000", 21);
	}
	
	public boolean isShoot() {
		return shoot;
	}

	public void setShoot(boolean shoot) {
		this.shoot = shoot;
	}

	public void render(Graphics2D g2d, int offset_x, int offset_y)
	{
		String move = dx > 0 ? "run_" : "stand_";
		move += this.getDirection() == Player.LEFT ? "left" : "right";
		// If shoot
		if(this.isShoot())
			move += "_shoot";
		Image img = animations.get(move).getImage();
		g2d.drawImage(img, x + offset_x, y + offset_y, x + width + offset_x, y + height + offset_y, 0, 0, img.getWidth(null),  img.getHeight(null), null);
		super.render(g2d, offset_x, offset_y);
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
