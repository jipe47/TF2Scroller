package display.listener;

import java.util.ArrayList;

public class WizardEventEmitter {
	
	private ArrayList<WizardListener> listeners;
	
	public WizardEventEmitter()
	{
		listeners = new ArrayList<WizardListener>();
	}
	
	public void addListener(WizardListener listener)
	{
		this.listeners.add(listener);
	}
	
	public void fireEvent(WizardEvent e)
	{
		for(WizardListener l : listeners)
			l.actionPerformed(e);
	}
}
