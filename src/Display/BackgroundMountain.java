package Display;

public class BackgroundMountain extends BackgroundLayer {
	
	public BackgroundMountain()
	{
		this.setTexture(ImageLibrary.getImage("background_mountain").getImage());
		this.setY(40);
		this.setX(500);
		this.setDx(0.6);
		this.setDy(0.01);
	}

}
