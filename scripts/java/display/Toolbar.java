package display;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.LinkedList;

import javax.swing.JButton;
import javax.swing.JPanel;
import javax.swing.JToolBar;

public class Toolbar extends JToolBar implements ActionListener{
	
	private static final long serialVersionUID = 1L;
	
	private JButton newAnimationButton, newImageButton;
	private JButton saveButton, openButton, newButton;
	
	JToolBar toolbar;
	
	private LinkedList<ActionListener> listeners;
	
	public Toolbar()
	{
		super();
		toolbar = new JToolBar();
		
		listeners = new LinkedList<ActionListener>();
		
		saveButton = new JButton("Save");
		saveButton.addActionListener(this);
		newButton = new JButton("New");
		newButton.addActionListener(this);
		openButton = new JButton("Open");
		openButton.addActionListener(this);
		
		newAnimationButton = new JButton("New Animation");
		newAnimationButton.addActionListener(this);
		newImageButton = new JButton("New Image");
		newImageButton.addActionListener(this);
		
		this.add(newButton);
		this.add(openButton);
		this.add(saveButton);
		this.addSeparator();
		this.add(newAnimationButton);
		this.add(newImageButton);
		
	}
	public void addActionListener(ActionListener l)
	{
		this.listeners.add(l);
	}
	public void actionPerformed(ActionEvent arg0) {
		/*Object s = arg0.getSource();
		
		if(s == saveButton)
		{
			
		}
		else if(s == newButton)
		{
			
		}
		else if(s == openButton)
		{
			
		}
		else if(s == newAnimationButton)
		{
			
		}
		else if(s == newImageButton)
		{
			
		}*/
		
		for(int i = 0 ; i < listeners.size() ; i++)
			listeners.get(i).actionPerformed(arg0);
	}

}
