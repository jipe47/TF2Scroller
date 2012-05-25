package Display;

import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.Image;

import Game.Debug;

public abstract class BackgroundLayer {
	private int x = 0, y = 0;
	private double dx = 1, dy = 1;
	private Color backgroundColor = null;
	private Image texture = null;
	private boolean repeatX, repeatY;
	
	public void render(Graphics2D g2d, int width, int height, int offset_x, int offset_y)
	{
		if(backgroundColor != null)
		{
			g2d.setColor(backgroundColor);
			g2d.fillRect(0, 0, width, height);
		}
		
		if(texture != null)
		{
			int decalX = (int)(offset_x * dx);
			int decalY = (int)(offset_y * dy);
			int b_x = x + decalX;
			int b_y = y + decalY;
			g2d.setColor(GameColor.black);
			
			g2d.drawImage(texture, b_x, b_y, null);
			
			if(this.repeatX)
			{
				int r_x = x + texture.getWidth(null);
				Debug.echo("Starting background repetition\nx = "+String.valueOf(x)+"\n==========");
				int i = 0;
				while(r_x < width)
				{
					g2d.drawImage(texture, r_x + decalX, b_y, null);
					r_x += texture.getWidth(null);
					Debug.echo("It " + String.valueOf(i) + " : r_x = " + r_x);
					i++;
				}
				Debug.echo("===================\nEnd of background repetition");
			}
		}
	}

	public int getX() {
		return x;
	}

	public void setX(int x) {
		this.x = x;
	}

	public int getY() {
		return y;
	}

	public void setY(int y) {
		this.y = y;
	}

	public double getDx() {
		return dx;
	}

	public void setDx(double dx) {
		this.dx = dx;
	}

	public double getDy() {
		return dy;
	}

	public void setDy(double dy) {
		this.dy = dy;
	}

	public Color getBackgroundColor() {
		return backgroundColor;
	}

	public void setBackgroundColor(Color backgroundColor) {
		this.backgroundColor = backgroundColor;
	}

	public boolean isRepeatX() {
		return repeatX;
	}

	public void setRepeatX(boolean repeatX) {
		this.repeatX = repeatX;
	}

	public boolean isRepeatY() {
		return repeatY;
	}

	public void setRepeatY(boolean repeatY) {
		this.repeatY = repeatY;
	}

	public Image getTexture() {
		return texture;
	}

	public void setTexture(Image texture) {
		this.texture = texture;
	}
}
