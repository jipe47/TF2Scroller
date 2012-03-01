package Display;

import java.awt.Color;
import java.awt.Graphics2D;

import Game.Game;

public class Screen {
	
	private ImageLib imageLib;
	private Game game;
	
	private int maxWidth, maxHeight;
	
	
	public Screen(Game game) {
		
		imageLib = new ImageLib();
		this.game = game;
		
	}
	
	public Graphics2D render(Graphics2D g) {

		maxHeight = game.getHeight();
		maxWidth = game.getWidth();
		
		// Clear screen
		g.setColor(new Color(255, 255, 255));
		g.fillRect(0, 0, maxWidth, maxHeight);
		
		return g;
	}
	
	public int getMaxWidth()
	{
		return maxWidth;
	}
	public int getMaxHeight()
	{
		return maxHeight;
	}
}
