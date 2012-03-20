package display;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.Image;
import java.net.URL;

import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JSplitPane;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;

public class Window extends JFrame{
	
	private static final long serialVersionUID = 1L;
	
	private LeftPanel lp;
	private MiddlePanel mp;
	private RightPanel rp;

	public Window()
	{
		this.setPreferredSize(new Dimension(1280, 720));
		this.setTitle("Scroller Scripting");
		this.setIconImage(new ImageIcon(getClass().getResource("icon.png")).getImage());		
		try {
			UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
		} catch (ClassNotFoundException | InstantiationException
				| IllegalAccessException | UnsupportedLookAndFeelException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
		mp = new MiddlePanel();
		lp = new LeftPanel(mp);
		//rp = new RightPanel();
		
		JSplitPane split = new JSplitPane(JSplitPane.HORIZONTAL_SPLIT, lp, mp);
		//split.add(rp);
		
		this.getContentPane().add(split, BorderLayout.CENTER);
		
		
		this.pack();
		this.setVisible(true);
		this.setDefaultCloseOperation(EXIT_ON_CLOSE);
	}

}
