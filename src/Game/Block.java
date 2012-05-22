package Game;

import java.awt.Graphics2D;

import javax.swing.ImageIcon;

import Display.GameColor;
import Display.ImageLibrary;
import Physic.Entity;

public class Block extends Entity {

	public Block(int x, int y, int width, int height)
	{
		this.setWidth(width);
		this.setHeight(height);
		this.setX(x);
		this.setY(y);
		this.setStatic(true);
	}
	
	public void render(Graphics2D g2d)
	{
		drawUid(g2d);
		g2d.setColor(GameColor.red);
		g2d.drawRect(x, y, width, height);
		
		ImageIcon texture = ImageLibrary.getImage("brickwall1");
		drawTexture(texture.getImage(), g2d);
	}
}
