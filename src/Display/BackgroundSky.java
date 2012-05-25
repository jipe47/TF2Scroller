package Display;

import java.awt.Color;

public class BackgroundSky extends BackgroundLayer {
	
	public BackgroundSky()
	{
		this.setBackgroundColor(new Color(119, 181, 254));
		this.setTexture(ImageLibrary.getImage("background_sky").getImage());
		this.setDx(0.2);
		this.setDy(0.001);
		this.setRepeatX(true);
	}

}
