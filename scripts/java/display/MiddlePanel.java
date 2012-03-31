package display;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JPanel;
import javax.swing.event.TreeSelectionEvent;
import javax.swing.event.TreeSelectionListener;

import display.listener.ControllerEvent;
import display.listener.ControllerListener;

public class MiddlePanel extends JPanel implements TreeSelectionListener, ActionListener, ControllerListener {
	
	MiddlePanel()
	{
		
	}

	public void valueChanged(TreeSelectionEvent e) {
		System.out.println("Selected: " + e.getPath().getLastPathComponent());
	}

	public void actionPerformed(ActionEvent e) {
		
	}

	public void actionPerformed(ControllerEvent arg0) {
		
	}

}
