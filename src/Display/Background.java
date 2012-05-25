package Display;

import java.awt.Graphics2D;
import java.util.ArrayList;

public class Background {

	private ArrayList<BackgroundLayer> layers;
	
	public Background()
	{
		layers = new ArrayList<BackgroundLayer>();
	}
	
	public void render(Graphics2D g2d, int width, int height, int offset_x, int offset_y)
	{
		for(int i = 0 ; i < layers.size() ; i++)
			layers.get(i).render(g2d, width, height, offset_x, offset_y);
	}
	
	public void addLayer(BackgroundLayer l)
	{
		layers.add(l);
	}
}
