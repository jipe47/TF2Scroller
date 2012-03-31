package imagemanager;

public class ImageInfo {
	private String path, name;
	
	// If is an animation
	private boolean animated;

	private String prefix;
	private int nbr_frame;
	private float speed;
	private String extension;
	
	public ImageInfo()
	{
	}
	
	public String toString()
	{
		return path;
	}
	
	public String toXml()
	{
		if(animated)
			return "<animation path=\""+path+"\" name=\""+name+"\" speed=\""+String.valueOf(speed)+"\" nbr_frame=\""+String.valueOf(nbr_frame)+"\" prefix=\""+prefix+"\" extension=\""+extension+"\" />\n";
		else
			return "<image path=\""+path+"\" name=\""+name+"\" />\n";
	}
	
	public String getPath() {
		return path;
	}

	public void setPath(String filename) {
		this.path = filename;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public boolean isAnimated() {
		return animated;
	}

	public void setAnimated(boolean animated) {
		this.animated = animated;
	}

	public String getPrefix() {
		return prefix;
	}

	public void setPrefix(String prefix) {
		this.prefix = prefix;
	}

	public int getNbr_frame() {
		return nbr_frame;
	}

	public void setNbr_frame(int nbr_frame) {
		this.nbr_frame = nbr_frame;
	}

	public float getSpeed() {
		return speed;
	}

	public void setSpeed(float speed) {
		this.speed = speed;
	}

	public String getExtension() {
		return extension;
	}

	public void setExtension(String extension) {
		this.extension = extension;
	}
	
}
