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
	
	// Game static parameters
	public static final int GAMESPEED = 30;
	public static final double GAMEAREA_X = 0.8;
	public static final double GAMEAREA_Y = 0.6;
	
	// Game dynamic parameters
	private int offset_x = 0;
	private int offset_y = 0;
	
	private int game_x = 0, game_y = 0, game_width = 0, game_height = 0;
	
	// Usefull stuff
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
		
		this.addEntity(new Block(400, 500, 200, 100));
		this.addEntity(new Block(400, 300, 400, 100));
		this.addEntity(new Block(-200, 400, 800, 100));
		this.addEntity(new Block(-300, 500, 800, 100));
		this.addEntity(new Block(-400, 600, 800, 100));
		this.addEntity(new Block(-500, 700, 800, 100));
		
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
		
		if(game_width == 0)
		{
			game_width = (int) (this.getWidth() * GAMEAREA_X);
			game_height = (int) (this.getHeight() * GAMEAREA_Y);
			
			game_x = (this.getWidth() - game_width) / 2;
			game_y = (this.getHeight() - game_height) / 2;
		}

		if(player.getX() + offset_x < game_x)
			offset_x += (game_x - player.getX() - offset_x);
		else if(player.getX() + player.getWidth() + offset_x > game_x + game_width)
			offset_x -= (player.getX() + player.getWidth() + offset_x - game_x - game_width);
		
		if(player.getY() + offset_y < game_y)
			offset_y += (game_y - player.getY() - offset_y);
		else if(player.getY() + player.getHeight() + offset_y > game_y + game_height)
			offset_y -= (player.getY() + player.getHeight() + offset_y - game_y - game_height);
		
		
			
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
			entities.get(i).render(g2d, offset_x, offset_y);
		
		// Draw collisions
		Entity e, f;
		for(int i = 0 ; i < entities.size() ; i++)
		{
			e = entities.get(i);
			for(int j = i + 1 ; j < entities.size() ; j++)
			{
				f = entities.get(j);
				e.drawCollision(f, g2d, offset_x, offset_y);
			}
		}
		
		// Draw game area
		g2d.drawRect(game_x, game_y, game_width, game_height);
		
		// Draw debug info
		g2d.drawString("offset_x = " +String.valueOf(offset_x), 5, 20);
		g2d.drawString("offset_y = " +String.valueOf(offset_y), 5, 40);
	}

	
}
