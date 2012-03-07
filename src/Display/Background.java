package Display;

import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.Random;

import javax.swing.Timer;

import Display.BackgroundLayers.*;

public class Background {
	
	private ArrayList<BackgroundLayer> layers;
	private ImageLib imageLib;
	
	private int cloudSpeed = 3;
	
	private int timeoutCloud = 100;
	private int timeoutMountain = 50;
	
	private int cCloud = timeoutCloud;
	private int cMountain = timeoutMountain;
	
	private int intervalleYCloud = 400;
	private int startYClound = 5;
	
	// Nombre de nuages dans les images
	private int nbCloud = 10;
	private int nbMountain = 6;
	
	private Screen s;

	public Background(Screen s, ImageLib l) {
		this.s = s;
		this.imageLib = l;
		
		layers = new ArrayList<BackgroundLayer>();
		
		/*layers.add(new Sky(l.getImage("backgrounds/bck1/sky.png")));
		
		Ground g = new Ground(l.getImage("backgrounds/bck1/ground.png"));
		//g.setCoord(0, s.getMaxHeight() - g.getHeight());
		g.setCoord(0, 549);
		layers.add(g);
		
		Hill h = new Hill(l.getImage("backgrounds/bck1/hill.png"));
		h.setCoord(0, 500);
		layers.add(h);*/
		
	}
	
	public boolean isLoaded()
	{
		Iterator<BackgroundLayer> it = layers.iterator();
		
		while(it.hasNext())
			if(!it.next().isLoaded())
				return false;
		
		return true;
		
	}
	
	public void drawBackground(Graphics2D g, int maxWidth)
	{
		this.generateEvent();
		Iterator<BackgroundLayer> it = layers.iterator();
		
		while(it.hasNext())
		{
			BackgroundLayer l = it.next();
			
			l.move();
			
			int xL = l.getX();
			int yL = l.getY();
			int wL = l.getWidth();
			int hL = l.getHeight();
			
			if(wL == 0)
				continue;
			
			int subX = Math.abs(xL) % wL;
			int subW = wL - subX;
			int drawed = 0;
			//System.out.println("subX = " + subX + " < wL " + wL);
			while(drawed < maxWidth)
			{
				g.drawImage(l.getImg(subX, 0, subW, hL), null, drawed, yL);
				drawed += subW;
				subX = 0;
				subW = wL;
			}
		}
		
	/*	Iterator<GraphicEvent> ite = events.iterator();
		
		while(ite.hasNext())
		{
			GraphicEvent e = ite.next();
			
			e.move();
			
			Image img = imageLib.getImage(e.getImgStr());
			
			g.drawImage(img, e.getX(), e.getY(), null);
		}
		*/
		
	}

	// Ajout d'un évènement graphique
	public void generateEvent() {
		
	/*	Random r = new Random();
		
		cCloud--;
		if(cCloud == 0)
		{
			cCloud = timeoutCloud;
			
			// Détermination de l'image
			int n = Math.abs((r.nextInt() % nbCloud)) + 1;

			System.out.println("Ajout d'un nuage " + n);

			Image i = imageLib.getImage("backgrounds/bck1/cloud" + n + ".png");
			
			// Détermination de la position verticale
			
			int y = this.startYClound + (this.intervalleYCloud % (Math.abs(r.nextInt()) % intervalleYCloud));
			System.out.println("Cloud avec y = " + y);
			GraphicEvent e = new GraphicEvent(s.getMaxWidth(), y, i.getWidth(null), i.getHeight(null), "backgrounds/bck1/cloud" + n + ".png");
			e.setDX(- cloudSpeed);
			events.add(e);
			System.out.println("addcloud !");
		}*/
		
	}
}
