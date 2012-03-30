package display;

import imagemanager.Image;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.LinkedList;
import java.util.List;

import javax.swing.BoxLayout;
import javax.swing.JButton;
import javax.swing.JFileChooser;
import javax.swing.JList;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.ListSelectionModel;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NodeList;

public class RightPanel extends JPanel implements ActionListener{
	
	private JButton loadButton;
	private JFileChooser chooser;
	private String xmlFile;
	
	private JScrollPane listScroller;
	private JList list;
	
	private LinkedList<Image> imagelist;
	
	private LeftPanel lp;
	
	public void saveXml()
	{
		if(xmlFile == null)
		{
			chooser.setDialogTitle("Choose a destination file");
		    chooser.setFileSelectionMode(JFileChooser.FILES_ONLY);
		    chooser.setAcceptAllFileFilterUsed(false);
		    
		    if (chooser.showSaveDialog(this) == JFileChooser.APPROVE_OPTION) { 
		    		String s = "-1";
					try {
						s = chooser.getSelectedFile().getCanonicalPath();
						System.out.println("Save in " + s);
						xmlFile = s;
					} catch (IOException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
		        	this.loadFile(s);
		        }
		      else {
		        System.out.println("No Selection ");
		        }
		}
		
		if(xmlFile == null)
		{
			System.out.println("Saving cancelled.");
			return;
		}
		else
			System.out.println("Savign file in " + xmlFile);
		
		try {
			FileOutputStream fos = new FileOutputStream(new File(xmlFile));
			String l = "<root directory=\""+lp.getDirectory()+"\">\n";
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
	
	public RightPanel(LeftPanel lp)
	{
		super();
		this.lp = lp;
		
		imagelist = new LinkedList<Image>();
		
		chooser = new JFileChooser(); 
		this.setLayout(new BoxLayout(this, BoxLayout.Y_AXIS));
		
		// Button handling
		loadButton = new JButton("Choose a xml file");
		loadButton.addActionListener(this);
		this.add(loadButton, BorderLayout.CENTER);
		
		
		// List handling
		list = new JList();
		list.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);
		list.setLayoutOrientation(JList.VERTICAL_WRAP);
		list.setVisibleRowCount(-1);
		
		listScroller = new JScrollPane(list);
		this.add(listScroller);
		
		
	}
	public void loadFile(String filePath)
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
			lp.loadDirectory(el.getAttribute("directory"));
			
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
			list.setListData(imagelist.toArray());
	}
	
	public void actionPerformed(ActionEvent arg0) {
		
		if(arg0.getActionCommand().equals("Open"))
		{
			chooser.setDialogTitle("Choose a directory to explore");
		    chooser.setFileSelectionMode(JFileChooser.FILES_ONLY);
		    chooser.setAcceptAllFileFilterUsed(false);
		    
		    if (chooser.showOpenDialog(this) == JFileChooser.APPROVE_OPTION) { 
		    		String s = "-1";
					try {
						s = chooser.getSelectedFile().getCanonicalPath();
					} catch (IOException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
		        	this.loadFile(s);
		        }
		      else {
		        System.out.println("No Selection ");
		        }
		}
		else if(arg0.getActionCommand().equals("Save"))
		{
			saveXml();
		}
	}
}
