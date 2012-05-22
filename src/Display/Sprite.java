package Display;

import java.awt.Image;

import Game.Debug;

public class Sprite {
	private int currentFrame = 0;
	private int nbr_frame;
	private String prefix;
	private int paddingSize;
	
	public Sprite(String prefix, int nbr_frame)
	{
		this.prefix = prefix;
		this.nbr_frame = nbr_frame;
		this.paddingSize = nbrOfDigit(nbr_frame);
		
	}
	
	private int nbrOfDigit(int nbr)
	{
		int size = 1;
		while(nbr >= 10)
		{
			size++;
			nbr = nbr / 10;
		}
		return size;
	}
	
	public Image getImage()
	{
		int pad = paddingSize - nbrOfDigit(currentFrame);
		//System.out.println("prefix = " + prefix + "\ncurrentFrame = "+currentFrame+"\npaddingSize="+paddingSize+"\npad = " + String.valueOf(pad));
		String picture =  prefix;
		if(pad > 0)
			picture = picture + String.format("%"+String.valueOf(pad)+"s", "").replace(' ', '0');
		picture = picture + String.valueOf(currentFrame);
		//Debug.echo("Retreiving " + picture);
		Image i = ImageLibrary.getImage(picture).getImage();
		currentFrame = (currentFrame + 1)%nbr_frame;
		return i;
	}
}
