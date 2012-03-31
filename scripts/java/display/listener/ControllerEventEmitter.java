package display.listener;

import java.util.ArrayList;

public class ControllerEventEmitter {
	
	private ArrayList<ControllerListener> listeners;
	
	public ControllerEventEmitter()
	{
		listeners = new ArrayList<ControllerListener>();
	}
	
	public void addListener(ControllerListener listener)
	{
		this.listeners.add(listener);
	}
	
	public void fireEvent(ControllerEvent e)
	{
		for(ControllerListener l : listeners)
			l.actionPerformed(e);
	}
}
