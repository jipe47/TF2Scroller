package display;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.Toolkit;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;

import javax.imageio.ImageIO;
import javax.swing.JPanel;

public class ImagePreview extends JPanel {

	private static final long serialVersionUID = 1L;
	private Image image;

	public ImagePreview() {
	}

	public void setImage(String input) {
		image = Toolkit.getDefaultToolkit().getImage(input);
	}

	public void paintComponent(Graphics g) {
		if (image == null)
		{
			System.out.println("image is NULL");
			return;
		}
		else
			System.out.println("Image not null");
		g.setColor(new Color(255, 255, 255));
		g.fillRect(0, 0, 400, 400);
		g.drawImage(image, 0, 0, 200, 300, null);
	}
}
