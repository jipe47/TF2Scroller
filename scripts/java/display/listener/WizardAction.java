package display.listener;

public class WizardAction {
	public static final WizardAction NewXml = new WizardAction(0);
	public static final WizardAction OpenXml = new WizardAction(1);
	public static final WizardAction SaveXml = new WizardAction(2);
	public static final WizardAction NewAnimation = new WizardAction(3);
	public static final WizardAction NewImage = new WizardAction(4);
	public static final WizardAction NewProject = new WizardAction(5);
	
	private int action;
	
	public WizardAction(int action)
	{
		this.action = action;
	}
	
	public int getAction()
	{
		return action;
	}
}
