package Display;

import java.awt.Color;
import java.awt.Graphics2D;

public abstract class BackgroundLayer {
	private int x, y, dx, dy;
	private Color backgroundColor;
	private boolean repeatX, repeatY;
	
	public void render(Graphics2D g2d)
	{
		
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

	public int getDx() {
		return dx;
	}

	public void setDx(int dx) {
		this.dx = dx;
	}

	public int getDy() {
		return dy;
	}

	public void setDy(int dy) {
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
}
