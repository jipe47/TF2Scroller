package Game;

public class IAPlayer extends Player {
	
	protected int rangeViewX, rangeViewY;
	protected int rangeShootX, rangeShootY;
	
	public int getRangeViewX() {
		return rangeViewX;
	}
	public void setRangeViewX(int rangeViewX) {
		this.rangeViewX = rangeViewX;
	}
	public int getRangeViewY() {
		return rangeViewY;
	}
	public void setRangeViewY(int rangeViewY) {
		this.rangeViewY = rangeViewY;
	}
	public int getRangeShootX() {
		return rangeShootX;
	}
	public void setRangeShootX(int rangeShootX) {
		this.rangeShootX = rangeShootX;
	}
	public int getRangeShootY() {
		return rangeShootY;
	}
	public void setRangeShootY(int rangeShootY) {
		this.rangeShootY = rangeShootY;
	}
}
