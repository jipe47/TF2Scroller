package display;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.Toolkit;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;

import javax.imageio.ImageIO;
import javax.swing.JPanel;
import javax.swing.SwingUtilities;

public class ImagePreview extends JPanel {

	private static final long serialVersionUID = 1L;
	private Image image;

	public ImagePreview() {
	}

	public void setImage(String input) {
		image = Toolkit.getDefaultToolkit().getImage(input);
		repaint();
	}

	protected void paintComponent(Graphics g) {
		super.paintComponent(g);
		if (image == null)
		{
			System.out.println("image is NULL");
			return;
		}
		else
			System.out.println("Image not null");
		
		
		
		Dimension size = this.getSize();
		
		int wImage = image.getWidth(null);
		int hImage = image.getHeight(null);
		
		int wPreview = size.width;
		int hPreview = size.height;
		
		float rImage = (float)wImage / (float)hImage;
		float rPreview = (float)wPreview / (float)hPreview;
		
		if(rPreview > rImage)
		{
			hImage = hPreview;
			wImage = (int) (hImage * rImage);
			System.out.println("Cas 1");
		}
		else
		{
			wImage = wPreview;
			hImage = (int) (wImage / rImage);
			System.out.println("Cas 2");
		}
		/*
		if(wImage > wPreview && hImage > hPreview)
		{
			System.out.println("Cas 1");
			if(wImage > hImage)
			{
				System.out.println("Cas a");
				wImage = wPreview;
				hImage = (int) (wImage * rImage);
			}
			else
			{
				System.out.println("Cas b");
				hImage = hPreview;
				wImage = (int) (hImage / rImage);
			}
		}
		else if(hPreview < hImage)
		{
			System.out.println("Cas 2");
			hImage = hPreview;
			wImage = (int)(hImage / rImage);
		}
		else if(wPreview < wImage)
		{
			System.out.println("Cas 3");
			wImage = wPreview;
			hImage = (int)(wImage * rImage);
		}
		else
		{
			System.out.println("No redim");
		}
		*/
		
		int x = (int) Math.floor((wPreview - wImage) / 2);
		int y = (int) Math.floor((hPreview - hImage) / 2);
		
		//g.setColor(new Color(255, 255, 255));
		g.fillRect(0, 0, wPreview, hPreview);
		g.drawImage(image, x, y, wImage, hImage, this);
	}
}
