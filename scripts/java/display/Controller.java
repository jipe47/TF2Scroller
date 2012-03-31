package display;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;

import imagemanager.Image;

import javax.swing.JFileChooser;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NodeList;

import display.listener.ControllerAction;
import display.listener.ControllerEvent;
import display.listener.ControllerEventEmitter;
import display.listener.ControllerListener;
import display.listener.EventContainer;
import display.listener.WizardAction;
import display.listener.WizardEvent;
import display.listener.WizardListener;

public class Controller implements WizardListener {
	
	private ArrayList<Image> imagelist;
	
	private String xmlFile, imageDirectory;
	private ControllerEventEmitter eventEmitter;

	public Controller()
	{
		imagelist = new ArrayList<Image>();
		eventEmitter = new ControllerEventEmitter();
	}
	
	public void addListener(ControllerListener l)
	{
		eventEmitter.addListener(l);
	}
	private void fireEvent(ControllerEvent e)
	{
		eventEmitter.fireEvent(e);
	}
	
	public void actionPerformed(WizardEvent arg0) {
		WizardAction action = arg0.getAction();
		if(action == WizardAction.NewXml)
		{
			
		}
	}
	
	public void loadXmlFile(String filePath)
	{
		// Extension verification
		int mid = filePath.lastIndexOf(".");
		
		if(!filePath.substring(mid).equals(".xml"))
		{
			System.err.println("Invalid extension: " + filePath.substring(mid));
			return;
		}
			
		// Load the file!	
		imagelist.clear();
		System.out.println("Loading file " + filePath);
		
		DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();

		try {
			//Using factory get an instance of document builder
			DocumentBuilder db = dbf.newDocumentBuilder();

		
			Document dom = db.parse(filePath);
			Element docEle = dom.getDocumentElement();

			
			// Get dir path
			NodeList nl;
			nl = docEle.getElementsByTagName("root");
			Element el;
			el = (Element) nl.item(0);
			//lp.loadDirectory(el.getAttribute("directory"));
			EventContainer ec = new EventContainer();
			ec.addArg("directory", el.getAttribute("directory"));
			this.fireEvent(new ControllerEvent(ControllerAction.loadDirectory, ec));
			
			// Get animations and images 
			nl = docEle.getElementsByTagName("image");
			
			Image im;
			
			if(nl != null && nl.getLength() > 0)
			{
				for(int i = 0 ; i < nl.getLength() ; i++)
				{
					el = (Element) nl.item(i);
					
					im = new Image();
					im.setFilename(el.getAttribute("filename"));
					im.setName(el.getAttribute("name"));
					im.setAnimated(false);
					imagelist.add(im);
				}
			}
			
			nl = docEle.getElementsByTagName("animation");
			
			if(nl != null && nl.getLength() > 0)
			{
				for(int i = 0 ; i < nl.getLength() ; i++)
				{
					el = (Element) nl.item(i);
					
					im = new Image();
					im.setFilename(el.getAttribute("filename"));
					im.setName(el.getAttribute("name"));
					im.setAnimated(true);
					im.setExtension(el.getAttribute("extension"));
					im.setNbr_frame(Integer.parseInt(el.getAttribute("nbr_frame")));
					im.setSpeed(Float.parseFloat(el.getAttribute("speed")));
					im.setPrefix(el.getAttribute("prefix"));
					imagelist.add(im);
				}
			}

		}catch(Exception e) {
			System.err.println("File loading failed : " + e.getMessage());
		}
		
		if(imagelist.size() > 0)
		{
			//list.setListData(imagelist.toArray());
		}
	}
	
	public void saveXml()
	{
		try {
			FileOutputStream fos = new FileOutputStream(new File(xmlFile));
			String l = "<root directory=\""+imageDirectory+"\">\n";
			fos.write(l.getBytes());
			for(int i = 0 ; i < imagelist.size() ; i++)
				fos.write(imagelist.get(i).toXml().getBytes());
			fos.write("</root>\n".getBytes());
			
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}

}
