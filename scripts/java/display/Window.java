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
	
	private Toolbar tb;
	
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
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (InstantiationException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IllegalAccessException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (UnsupportedLookAndFeelException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		tb = new Toolbar();
		
		this.add(tb, BorderLayout.NORTH);
		
		mp = new MiddlePanel();
		lp = new LeftPanel(mp);
		rp = new RightPanel(lp);
		
		tb.addActionListener(mp);
		tb.addActionListener(rp);
		tb.addActionListener(lp);
		
		/*
		JSplitPane split = new JSplitPane(JSplitPane.HORIZONTAL_SPLIT, lp, mp);
		JSplitPane split2 = new JSplitPane(JSplitPane.HORIZONTAL_SPLIT, split, rp);
		
		this.getContentPane().add(split2, BorderLayout.CENTER);
		*/
		
		this.getContentPane().add(lp, BorderLayout.WEST);
		this.getContentPane().add(mp, BorderLayout.CENTER);
		this.getContentPane().add(rp, BorderLayout.EAST);
		
		this.pack();
		this.setVisible(true);
		this.setDefaultCloseOperation(EXIT_ON_CLOSE);
	}

}
