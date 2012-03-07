package Game;

import java.awt.*;
import java.awt.event.*;

import javax.swing.*;

import javax.swing.JPanel;

import Display.Screen;

public class Game extends JPanel implements KeyListener, ActionListener {
	
	private static final long serialVersionUID = 1L;

	private final int GAMESPEED = 20;
	
	public final static int LEFT = -1;
	public final static int RIGHT = 1;
	private Timer t;
	private Screen screen;
	
	
	public Game() {
		this.requestFocus();
		setFocusable(true);
		this.addKeyListener(this);
		this.screen = new Screen(this);
		
		t = new Timer(GAMESPEED, this);
	}
	
	public void paintComponent(Graphics g) {
		
		Graphics2D g2d = (Graphics2D) g;
		screen.render(g2d);
	}

	// Refresh
	public void actionPerformed(ActionEvent arg0) {
		
		this.repaint();
	}
	
	public void keyPressed(KeyEvent e) {
		
	}
	public void keyReleased(KeyEvent e) {
		
	}
	
	public void keyTyped(KeyEvent e) {
		
	}
}
