package display.listener;

public class ControllerAction {
	public static final ControllerAction loadDirectory = new ControllerAction(0);
	public static final ControllerAction loadXml = new ControllerAction(1);
	
	private int action;
	
	public ControllerAction(int action)
	{
		this.action = action;
	}
	
	public int getAction()
	{
		return action;
	}
}
