package Display;

import java.awt.Graphics;
import java.awt.Image;
import java.awt.image.BufferedImage;

import javax.swing.ImageIcon;

public class BackgroundLayer {

	private int speed;
	private int x, y;
	private int width, height;
	
	private BufferedImage img;
	private BufferedImage sub;
	
	private int subX, subY, subW, subH;
		
	private boolean isLoaded = false;
	public BackgroundLayer(Image image, int speed)
	{
		this.x = 0;
		this.y = 0;
		
		this.speed = speed;
		
		this.width = image.getWidth(null);
		this.height = image.getHeight(null);
		
		img = new BufferedImage(width, height, BufferedImage.TYPE_INT_ARGB);
		 Graphics g = img.getGraphics();
		g.drawImage(image, 0, 0, null);
		
		isLoaded = true;
	}
	public boolean isLoaded()
	{
		return isLoaded;
	}
	public BufferedImage getImg()
	{
		return img;
	}
	
	private void loadSub(int x, int y, int w, int h)
	{
		this.sub = img.getSubimage(x, y, w, h);
		this.subX = x;
		this.subY = y;
		this.subH = h;
		this.subW = w;
		//System.out.println("loadSub");
		
	}
	public BufferedImage getImg(int x, int y, int w, int h)
	{
		
		//System.out.println("getImg");
		if(x != subX || y != subY || h != subH || w != subW)
			loadSub(x, y, w, h);
		
		return sub;
	}
	
	public void setCoord(int x, int y)
	{
		this.x = x;
		this.y = y;
	}
	public void move()
	{
		x = x - speed;
	}
	
	public int getX()
	{
		return x;
	}
	public int getY()
	{
		return y;
	}
	public int getWidth()
	{
		return width;
	}
	public int getHeight()
	{
		return height;
	}
}
