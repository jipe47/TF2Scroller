package Display;

import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import Display.*;

import javax.swing.Timer;

public class Sprite {
	
	private String name;
	
	private int x, y;
	private int currentFrame = 0;
	
	public Sprite(String name, int x, int y)
	{
		this.name = name;
		this.x = x;
		this.y = y;
	}
	
	public Image getImage()
	{
		currentFrame++;
		return null;
	}
	
	public int getX()
	{
		return x;
	}
	public int getY()
	{
		return y;
	}
	public void resetFrame()
	{
		currentFrame = 0;
	}
}
