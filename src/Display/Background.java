package Display;

import java.awt.Graphics2D;
import java.util.ArrayList;

public class Background {

	private ArrayList<BackgroundLayer> layers;
	
	public Background()
	{
		layers = new ArrayList<BackgroundLayer>();
	}
	
	public void render(Graphics2D g2d)
	{
		for(int i = 0 ; i < layers.size() ; i++)
			layers.get(i).render(g2d);
	}
	
	public void addLayer(BackgroundLayer l)
	{
		layers.add(l);
	}
}
