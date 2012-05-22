package Display;

import java.util.HashMap;

import javax.swing.ImageIcon;

public class ImageLibrary {

	private static HashMap<String, ImageIcon> library;
	private static boolean isLoaded = false;
	
	public static void loadImage()
	{
		library = new HashMap<String, ImageIcon>();
		
		ImageIcon img = new ImageIcon("assets/texture/brickwall2.jpg");
		
		library.put("brickwall1", img);
		isLoaded = true;
	}
	
	public static ImageIcon getImage(String name)
	{
		if(!isLoaded)
			loadImage();
		return library.get(name);
	}
}
