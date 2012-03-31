package display;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;

import imagemanager.ImageInfo;
import imagemanager.ImageTree;

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
	
	private ArrayList<ImageInfo> imagelist;
	private ImageTree imagetree;
	
	private String xmlFile, imageDirectory;
	private boolean xmlFileExists;
	private ControllerEventEmitter eventEmitter;
	

	public Controller()
	{
		imagelist = new ArrayList<ImageInfo>();
		eventEmitter = new ControllerEventEmitter();
		
		imagetree = new ImageTree();
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
		if(action == WizardAction.NewProject)
		{
			xmlFile = (String) arg0.getArg("xml");
			imageDirectory = (String) arg0.getArg("directory");
			System.out.println("Controller: open " + xmlFile + " in " + imageDirectory);
			xmlFileExists = false;
			//loadXmlFile();
		}
	}
	
	
	
	public void loadXmlFile(String s)
	{
		this.xmlFile = s;
		xmlFileExists = true;
		loadXmlFile();
	}
	
	public void loadXmlFile()
	{
		// Extension verification
		int mid = xmlFile.lastIndexOf(".");
		
		if(!xmlFile.substring(mid).equals(".xml"))
		{
			System.err.println("Invalid extension: " + xmlFile.substring(mid));
			return;
		}
			
		// Load the file!	
		imagelist.clear();
		imagetree.reset();
		System.out.println("Loading file " + xmlFile);
		EventContainer ec;
		DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();

		try {
			//Using factory get an instance of document builder
			DocumentBuilder db = dbf.newDocumentBuilder();

		
			Document dom = db.parse(new File(xmlFile));
			Element docEle = dom.getDocumentElement();

			
			NodeList nl;
			Element el;
			
			// Get dir path
			el = dom.getDocumentElement();
			
			ec = new EventContainer();
			ec.addArg("directory", el.getAttribute("directory"));
			this.fireEvent(new ControllerEvent(ControllerAction.loadDirectory, ec));
			
			// Get animations and images 
			nl = docEle.getElementsByTagName("image");
			
			ImageInfo im;
			
			if(nl != null && nl.getLength() > 0)
			{
				for(int i = 0 ; i < nl.getLength() ; i++)
				{
					el = (Element) nl.item(i);
					
					im = new ImageInfo();
					im.setPath(el.getAttribute("path"));
					im.setName(el.getAttribute("name"));
					im.setAnimated(false);
					
					imagelist.add(im);
					imagetree.addNode(el.getAttribute("path"), im);
				}
			}
			
			nl = docEle.getElementsByTagName("animation");
			
			if(nl != null && nl.getLength() > 0)
			{
				for(int i = 0 ; i < nl.getLength() ; i++)
				{
					el = (Element) nl.item(i);
					
					im = new ImageInfo();
					im.setPath(el.getAttribute("path"));
					im.setName(el.getAttribute("name"));
					im.setAnimated(true);
					im.setExtension(el.getAttribute("extension"));
					im.setNbr_frame(Integer.parseInt(el.getAttribute("nbr_frame")));
					im.setSpeed(Float.parseFloat(el.getAttribute("speed")));
					im.setPrefix(el.getAttribute("prefix"));
					
					imagelist.add(im);
					imagetree.addNode(el.getAttribute("path"), im);
				}
			}

		}catch(Exception e) {
			System.err.println("File loading failed : " + e.getMessage());
			e.printStackTrace();
		}
		
		System.out.println("File loaded");
		ec = new EventContainer();
		ec.addArg("imagetree", imagetree);
		
		this.eventEmitter.fireEvent(new ControllerEvent(ControllerAction.loadXml, ec));
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
