package display.listener;

public class WizardEvent {

	private WizardAction action;
	public WizardEvent(WizardAction action)
	{
		this.action = action;
	}
	
	public WizardAction getAction()
	{
		return action;
	}
}
