package display;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;

import javax.swing.BoxLayout;
import javax.swing.JButton;
import javax.swing.JFileChooser;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTree;
import javax.swing.event.TreeSelectionEvent;
import javax.swing.event.TreeSelectionListener;

public class LeftPanel extends JPanel implements ActionListener {
	
	private static final long serialVersionUID = 1L;

	private JButton loadButton;
	private JScrollPane tree_view;
	private JFileChooser chooser;
	
	private MiddlePanel mp;
	
	private JTree tree;
	
	public LeftPanel(MiddlePanel mp)
	{
		super();
		this.mp = mp;
		tree = new JTree();
		tree_view = new JScrollPane(tree);
		this.setLayout(new BoxLayout(this, BoxLayout.Y_AXIS));

		
		loadButton = new JButton("Choose a dir");
		loadButton.addActionListener(this);
		
		
		this.add(loadButton, BorderLayout.CENTER);
		
		tree.addTreeSelectionListener(mp);
		
		loadDirectory("C:/");
		this.add(tree_view, BorderLayout.CENTER);
	}
	
	public void loadDirectory(String s)
	{
		File root = new File(s);
		FileTreeModel model = new FileTreeModel(root);
	    
	    tree.setModel(model);
	    //tree_view.setViewportView(tree);
	}

	public void actionPerformed(ActionEvent arg0)
	{
		chooser = new JFileChooser(); 
	    chooser.setCurrentDirectory(new java.io.File("."));
	    chooser.setDialogTitle("Choose a directory to explode");
	    chooser.setFileSelectionMode(JFileChooser.DIRECTORIES_ONLY);
	    chooser.setAcceptAllFileFilterUsed(false);
	    
	    if (chooser.showOpenDialog(this) == JFileChooser.APPROVE_OPTION) { 
	    		String s = chooser.getCurrentDirectory().getAbsolutePath();
	        	this.loadDirectory(s);
	        }
	      else {
	        System.out.println("No Selection ");
	        }
	}
}
