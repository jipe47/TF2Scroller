package Display;

import java.awt.Graphics;
import java.awt.Image;
import java.awt.Toolkit;
import java.awt.image.BufferedImage;

import javax.swing.ImageIcon;

public class AnimatedSprite {
	private Image[] frames;
	private String name;
	
	public AnimatedSprite(String name, int row, int col)
	{
		this.name = name;
		String f = "images/sprites/" + name + ".png";
		
		
		System.out.println("Chargement de " + f + " (" + row + ", " + col + ")");
		ImageIcon im = new ImageIcon(getClass().getResource(f));
		Image image = im.getImage();
		

		int w = image.getWidth(null);
		int h = image.getHeight(null);
		BufferedImage buf = new BufferedImage(w, h, BufferedImage.TYPE_INT_ARGB);
		Graphics g = buf.getGraphics();
		g.drawImage(image, 0, 0, null);
		int caseWidth = w/col;
		int caseHeight = h/row;
		
 		
		frames = new Image[row * col];
		for(int i = 0 ; i < row ; i++)
			for(int j = 0 ; j < col ; j++)
				frames[(i * col) + j] = Toolkit.getDefaultToolkit().createImage(buf.getSubimage(j * caseWidth, i * caseHeight, caseWidth, caseHeight).getSource());
		//System.out.println("Fin chargement " + f);
	}
	public String toString()
	{
		return "Animation " + name;
	}
	public Image getImage(int i) throws Exception
	{
		//System.out.println("Demande image " + i);
		if(i >= frames.length)
			throw new Exception("Invalid Frame");
		
		return frames[i];
	}
	
}
