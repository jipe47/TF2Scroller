package Display;

import java.util.HashMap;

import javax.swing.ImageIcon;

public class ImageLibrary {

	private static HashMap<String, ImageIcon> library;
	private static boolean isLoaded = false;
	
	public static void loadImage()
	{
		library = new HashMap<String, ImageIcon>();
		
		// Load still images
		ImageIcon img = new ImageIcon("assets/texture/brickwall2.jpg");
		
		library.put("brickwall1", img);
		
		// Load sprites
		
		for(int i = 0 ; i <= 20 ; i++ )
		{
			String s;
			if(i < 10)
				s = "0"+String.valueOf(i);
			else
				s = String.valueOf(i);
			img = new ImageIcon("assets/animation/character/sniper/run_left_000"+s+".png");
			library.put("run_left_000"+s, img);
			
			img = new ImageIcon("assets/animation/character/sniper/run_right_000"+s+".png");
			library.put("run_right_000"+s, img);
			
			img = new ImageIcon("assets/animation/character/sniper/run_left_shoot_000"+s+".png");
			library.put("run_left_shoot_000"+s, img);
			
			img = new ImageIcon("assets/animation/character/sniper/run_right_shoot_000"+s+".png");
			library.put("run_right_shoot_000"+s, img);
		}
		
		for(int i = 0 ; i <= 36 ; i++ )
		{
			String s;
			if(i < 10)
				s = "0"+String.valueOf(i);
			else
				s = String.valueOf(i);
			img = new ImageIcon("assets/animation/character/sniper/stand_left_000"+s+".png");
			library.put("stand_left_000"+s, img);
			
			img = new ImageIcon("assets/animation/character/sniper/stand_right_000"+s+".png");
			library.put("stand_right_000"+s, img);
			
			img = new ImageIcon("assets/animation/character/sniper/stand_left_shoot_000"+s+".png");
			library.put("stand_left_shoot_000"+s, img);
			
			img = new ImageIcon("assets/animation/character/sniper/stand_right_shoot_000"+s+".png");
			library.put("stand_right_shoot_000"+s, img);
		}
		isLoaded = true;
	}
	
	public static ImageIcon getImage(String name)
	{
		if(!isLoaded)
			loadImage();
		return library.get(name);
	}
}
