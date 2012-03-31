package display.listener;

public class WizardEvent {

	private WizardAction action;
	private EventContainer eventContainer;
	public WizardEvent(WizardAction action, EventContainer eventContainer)
	{
		this.action = action;
		this.eventContainer = eventContainer;
	}
	
	public WizardAction getAction()
	{
		return action;
	}
	
	public Object getArg(String s)
	{
		return eventContainer.getArg(s);
	}
}
