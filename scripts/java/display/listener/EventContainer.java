package display.listener;

import java.util.HashMap;

public class EventContainer {
	private HashMap<String, Object> args;
	public EventContainer()
	{
		args = new HashMap<String, Object>();
	}
	
	public void addArg(String s, Object o){
		args.put(s, o);
	}
	
	public Object getArg(String s)
	{
		return args.get(s);
	}
}
