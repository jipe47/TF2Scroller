package Display;

import java.awt.Image;
import java.util.HashMap;

import javax.swing.ImageIcon;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;

import org.w3c.dom.*;

public class ImageLib {
	private HashMap<String,Sprite> lib;
	private boolean isLoaded = false;
	
	private boolean loadOnInstance = true;
	
	public ImageLib()
	{
		lib = new HashMap<String,Sprite>();
	}

	public Sprite getImage(String name)
	{
		return lib.get(name);
	}
	public boolean isLoaded()
	{
		return isLoaded;
	}
	public void startLoading()
	{
		DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();

		try {

			//Using factory get an instance of document builder
			DocumentBuilder db = dbf.newDocumentBuilder();

			//parse using builder to get DOM representation of the XML file
			Document dom = db.parse("src/Display/imagelist.xml");
			Element docEle = dom.getDocumentElement();
			NodeList nl = docEle.getElementsByTagName("image");
			
			if(nl != null && nl.getLength() > 0)
			{
				for(int i = 0 ; i < nl.getLength() ; i++)
				{
					Element el = (Element) nl.item(i);
					String file = el.getTextContent(); 
					System.out.println("IMAGE LIB : Chargement de " + file);
					/*ImageIcon im = new ImageIcon(getClass().getResource("../Display/images/" + file));
					lib.put(file, im.getImage());*/
				}
			}

		}catch(Exception e) {
			System.err.println("Image loading failed : " + e.getMessage());
		}
		isLoaded = true;
	}
}
