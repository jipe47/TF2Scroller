package Game;

import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.util.ArrayList;

import javax.swing.JPanel;
import javax.swing.Timer;

import Display.GameColor;
import Physic.Entity;
import Physic.PhysicEngine;

@SuppressWarnings("serial")
public class Game extends JPanel implements ActionListener, KeyListener {
	
	public static final int GAMESPEED = 30;
	
	private ArrayList<Entity> entities;
	private PhysicEngine physicEngine;
	private Timer timer;
	private int frame;
	
	private Player player;
	private boolean player_jump = false;
	
	public Game()
	{
		frame = 0;
		
		physicEngine = new PhysicEngine();
		entities = new ArrayList<Entity>();
		
		timer = new Timer(GAMESPEED, this);
		timer.start();
		
		player = new Player();
		this.addEntity(new Block(400, 100, 100, 100));
		this.addEntity(new Block(400, 500, 200, 100));
		this.addEntity(new Block(400, 300, 400, 100));
		this.addEntity(new Block(20, 400, 800, 100));
		
		this.addEntity(player);
		this.addKeyListener(this);
		
		setFocusable(true);
		this.requestFocus();
		
	}

	private void addEntity(Entity e)
	{
		this.entities.add(e);
		this.physicEngine.addEntity(e);
	}
	

	// Refresh
	public void actionPerformed(ActionEvent arg0) {
		if(player_jump)
			player.moveUp();
		physicEngine.update();
		this.repaint();
		//Debug.echo("Frame " + frame);
		frame++;
	}

	public void keyPressed(KeyEvent arg0) {
		
		switch(arg0.getKeyCode())
		{
			case KeyEvent.VK_LEFT:
				player.moveLeft();
				break;
			case KeyEvent.VK_RIGHT:
				player.moveRight();
				break;
			case KeyEvent.VK_UP:
				//player.moveUp();
				this.player_jump = true;
				break;
			case KeyEvent.VK_DOWN:
				player.moveDown();
				break;
			default:
			//	Debug.echo("Unsupported key");
		}
	}

	public void keyReleased(KeyEvent arg0) {
		switch(arg0.getKeyCode())
		{
			case KeyEvent.VK_LEFT:
				player.stopLeft();
				break;
			case KeyEvent.VK_RIGHT:
				player.stopRight();
				break;
			case KeyEvent.VK_UP:
				//player.stopUp();
				this.player_jump = false;
				break;
			case KeyEvent.VK_DOWN:
				player.stopDown();
				break;
		}
	}

	public void keyTyped(KeyEvent arg0) {
	}
	
	
	public void paintComponent(Graphics g) {
		
		Graphics2D g2d = (Graphics2D) g;
		
		// Draw background
		g2d.setColor(GameColor.white);
		g2d.fillRect(0, 0, this.getWidth(), this.getHeight());
		
		// Draw entities
		for(int i = 0 ; i < entities.size() ; i++)
			entities.get(i).render(g2d);
		
		// Draw collisions
		Entity e, f;
		for(int i = 0 ; i < entities.size() ; i++)
		{
			e = entities.get(i);
			for(int j = i + 1 ; j < entities.size() ; j++)
			{
				f = entities.get(j);
				e.drawCollision(f, g2d);
			}
		}
	}

	
}
