package display.listener;

public class ControllerEvent {

	private ControllerAction action;
	private EventContainer eventContainer;
	public ControllerEvent(ControllerAction action, EventContainer eventContainer)
	{
		this.action = action;
		this.eventContainer = eventContainer;
	}
	
	public ControllerAction getAction()
	{
		return action;
	}
	
	public Object getArg(String s)
	{
		return eventContainer.getArg(s);
	}
}
