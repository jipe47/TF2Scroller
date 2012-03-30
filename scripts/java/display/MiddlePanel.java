package display;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JPanel;
import javax.swing.event.TreeSelectionEvent;
import javax.swing.event.TreeSelectionListener;

public class MiddlePanel extends JPanel implements TreeSelectionListener, ActionListener {
	
	MiddlePanel()
	{
		
	}

	public void valueChanged(TreeSelectionEvent e) {
		System.out.println("S�lection de " + e.getPath().getLastPathComponent());
	}

	public void actionPerformed(ActionEvent e) {
		
	}

}
