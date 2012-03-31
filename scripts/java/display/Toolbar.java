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
		saveButton.setFocusable(false);
		
		newButton = new JButton("New");
		newButton.addActionListener(this);
		newButton.setFocusable(false);
		
		openButton = new JButton("Open");
		openButton.addActionListener(this);
		openButton.setFocusable(false);
		
		newAnimationButton = new JButton("New Animation");
		newAnimationButton.addActionListener(this);
		newAnimationButton.setFocusable(false);
		
		newImageButton = new JButton("New Image");
		newImageButton.addActionListener(this);
		newImageButton.setFocusable(false);
		
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
		for(int i = 0 ; i < listeners.size() ; i++)
			listeners.get(i).actionPerformed(arg0);
	}

}
