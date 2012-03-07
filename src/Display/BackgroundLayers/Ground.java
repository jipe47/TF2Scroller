package Display.BackgroundLayers;

import java.awt.Image;

import Display.BackgroundLayer;

public class Ground extends BackgroundLayer{
	
	private static final int SPEED = 5;
	
	public Ground(Image img)
	{
		super(img, SPEED);
	}
}
