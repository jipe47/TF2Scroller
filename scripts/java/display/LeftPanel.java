package display;

import imagemanager.ImageTree;

import java.awt.BorderLayout;
import java.awt.Dimension;
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
import javax.swing.tree.DefaultMutableTreeNode;

import display.listener.ControllerAction;
import display.listener.ControllerEvent;
import display.listener.ControllerListener;

public class LeftPanel extends JPanel implements ControllerListener {

	private static final long serialVersionUID = 1L;

	private JScrollPane tree_view;
	private String directory;
	private MiddlePanel mp;

	private JTree tree;
	private DefaultMutableTreeNode root;

	public LeftPanel(MiddlePanel mp) {
		super();
		this.mp = mp;
		
		root = new DefaultMutableTreeNode("Root");
		
		tree = new JTree(root);
		tree_view = new JScrollPane(tree);
		this.setLayout(new BoxLayout(this, BoxLayout.Y_AXIS));

		tree.addTreeSelectionListener(mp);
		
		this.add(tree_view, BorderLayout.CENTER);
		this.setMinimumSize(new Dimension(300, 42));
	}
	
	public String getDirectory() {
		return directory;
	}

	public void actionPerformed(ControllerEvent arg0) {
		if(arg0.getAction() == ControllerAction.loadXml)
		{
			ImageTree t = (ImageTree) arg0.getArg("imagetree");
			
			if(t == null)
			{
				System.err.println("t NULL :(");
			}
			System.out.println("Updating tree");
			t.insertIntoTree(root);
			//tree.setModel(root);
			tree = new JTree(root);
			tree_view = new JScrollPane(tree);
			this.repaint();
			System.out.println("Update complete");
		}
	}

}
