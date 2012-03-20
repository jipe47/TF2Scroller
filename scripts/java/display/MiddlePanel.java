package display;

import javax.swing.JPanel;
import javax.swing.event.TreeSelectionEvent;
import javax.swing.event.TreeSelectionListener;

public class MiddlePanel extends JPanel implements TreeSelectionListener {
	
	MiddlePanel()
	{
		
	}

	public void valueChanged(TreeSelectionEvent e) {
		System.out.println("Sélection de " + e.getPath().getLastPathComponent());
	}

}
