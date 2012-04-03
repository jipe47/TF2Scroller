package display;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.Toolkit;

import javax.swing.ImageIcon;
import javax.swing.JPanel;

public class ImagePreview extends JPanel {

	private static final long serialVersionUID = 1L;
	private ImageIcon image;

	public ImagePreview() {
	}

	public void setImage(ImageIcon input) {
		image = input;
		repaint();
	}

	protected void paintComponent(Graphics g) {
		super.paintComponent(g);
		if (image == null)
			return;
		
		Dimension size = this.getSize();
		
		int wImage = image.getIconWidth();
		int hImage = image.getIconHeight();
		
		int wPreview = size.width;
		int hPreview = size.height;
		
		float rImage = (float)wImage / (float)hImage;
		float rPreview = (float)wPreview / (float)hPreview;
		
		if(rPreview > rImage)
		{
			hImage = hPreview;
			wImage = (int) (hImage * rImage);
		}
		else
		{
			wImage = wPreview;
			hImage = (int) (wImage / rImage);
		}
		
		int x = (int) Math.floor((wPreview - wImage) / 2);
		int y = (int) Math.floor((hPreview - hImage) / 2);
		
		g.setColor(new Color(255, 255, 255));
		g.fillRect(0, 0, wPreview, hPreview);
		g.drawImage(image.getImage(), x, y, wImage, hImage, this);
	}
}
