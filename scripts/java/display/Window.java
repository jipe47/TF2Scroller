package display;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.IOException;
import java.net.URL;

import javax.swing.ImageIcon;
import javax.swing.JFileChooser;
import javax.swing.JFrame;
import javax.swing.JSplitPane;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;

public class Window extends JFrame implements ActionListener {

	private static final long serialVersionUID = 1L;

	private Toolbar tb;

	private LeftPanel lp;
	private MiddlePanel mp;

	private NewProjectWindow nfw;
	private NewImageWindow niw;
	private NewAnimationWindow naw;

	private Controller controller;
	private JFileChooser chooser;

	public Window() {
		controller = new Controller();
		chooser = new JFileChooser();

		initComponents();

		this.pack();
		this.setVisible(true);
		this.setDefaultCloseOperation(EXIT_ON_CLOSE);
	}

	private void initComponents() {
		nfw = new NewProjectWindow(this, true);
		niw = new NewImageWindow(this, true);
		naw = new NewAnimationWindow(this, true);

		nfw.setVisible(false);
		niw.setVisible(false);
		naw.setVisible(false);

		nfw.addListener(controller);
		niw.addListener(controller);
		naw.addListener(controller);

		this.setPreferredSize(new Dimension(1280, 720));
		this.setTitle("Scroller Scripting");
		this.setIconImage(new ImageIcon(getClass().getResource("icon.png"))
				.getImage());

		tb = new Toolbar();
		tb.addActionListener(this);
		this.add(tb, BorderLayout.NORTH);

		mp = new MiddlePanel();
		lp = new LeftPanel(mp);
		
		controller.addListener(lp);
		controller.addListener(mp);

		JSplitPane split = new JSplitPane(JSplitPane.HORIZONTAL_SPLIT, lp, mp);
		this.getContentPane().add(split, BorderLayout.CENTER);
	}

	public void actionPerformed(ActionEvent arg0) {
		String cmd = arg0.getActionCommand();

		if (cmd.equals("New")) {
			this.nfw.setVisible(true);
		} else if (cmd.equals("New Animation")) {
			this.naw.setVisible(true);
		} else if (cmd.equals("New Image")) {
			this.niw.setVisible(true);
		} else if (cmd.equals("Open")) {
			chooser.setDialogTitle("Choose a destination file");
			chooser.setFileSelectionMode(JFileChooser.FILES_ONLY);
			chooser.setAcceptAllFileFilterUsed(false);

			if (chooser.showOpenDialog(this) == JFileChooser.APPROVE_OPTION) {
				String s = "-1";
				try {
					s = chooser.getSelectedFile().getCanonicalPath();
					controller.loadXmlFile(s);
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			} else {
				System.out.println("No Selection ");
			}

		} else if (cmd.equals("Save")) {
			controller.saveXml();
		}

		/*
		 * else if(cmd.equals("")) {
		 * 
		 * }
		 */
	}

}
