package Display.BackgroundLayers;

import java.awt.Image;

import Display.BackgroundLayer;

public class Hill extends BackgroundLayer{
	
	private static final int SPEED = 2;
	
	public Hill(Image img)
	{
		super(img, SPEED);
	}
}
