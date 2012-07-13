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

import Display.*;
import IO.Keyboard;
import Physic.Entity;
import Physic.PhysicEngine;

@SuppressWarnings("serial")
public class Game extends JPanel implements ActionListener {
	
	// Game static parameters
	public static final int GAMESPEED = 30;
	public static final double GAMEAREA_X = 0.4;
	public static final double GAMEAREA_Y = 0.4;
	
	// Game dynamic parameters
	private int offset_x = 0;
	private int offset_y = 0;
	
	private int game_x = 0, game_y = 0, game_width = 0, game_height = 0;
	
	// Shooting variable
	private boolean player_shoot;
	private int player_shoot_delay = 100;
	private int player_shoot_counter = 0;
	
	// Usefull stuff
	private ArrayList<Entity> entities;
	private ArrayList<Projectile> projectiles;
	private PhysicEngine physicEngine;
	private Background background;
	private Timer timer;
	private Player player;
	/*
	private boolean player_jump = false;
	private boolean player_goLeft = false;
	private boolean player_goRight = false;
	*/
	
	private Keyboard keyboard;
	
	private ArrayList<IAPlayer> enemies;
	
	public Game()
	{
		keyboard = new Keyboard();
		this.addKeyListener(keyboard);
		physicEngine = new PhysicEngine();
		entities = new ArrayList<Entity>();
		projectiles = new ArrayList<Projectile>();
		enemies = new ArrayList<IAPlayer>();
		
		background = new Background();
		
		background.addLayer(new BackgroundSky());
		background.addLayer(new BackgroundMountain());
		 
		
		timer = new Timer(GAMESPEED, this);
		timer.start();
		
		//player = new Player();
		player = new Human();
		
		IAPlayer enemy = new EnemyHeavy();
		this.addEntity(enemy);
		enemies.add(enemy);
		
		enemy = new EnemyLight();
		this.addEntity(enemy);
		enemies.add(enemy);
		
		
		
		this.addEntity(new Block(400, 500, 200, 100));
		this.addEntity(new Block(400, 300, 3000, 100));
		this.addEntity(new Block(-200, 400, 800, 100));
		this.addEntity(new Block(-300, 500, 800, 100));
		this.addEntity(new Block(-400, 600, 800, 100));
		this.addEntity(new Block(-500, 700, 800, 100));
		
		this.addEntity(player);
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
		keyboard.poll();
		
		
		//if(player_jump)
		if(keyboard.keyDown(KeyEvent.VK_SPACE))
			player.moveUp();
		
		if(keyboard.keyDown(KeyEvent.VK_RIGHT))
		{
			player.moveRight();
			Debug.echo("Move right");
		}
		else if(keyboard.keyDown(KeyEvent.VK_LEFT))
		{
			player.moveLeft();
			Debug.echo("Move left");
		}
		else
		{
			player.stop();
			Debug.echo("Stop");
		}
		//if(arg0.isControlDown())
		if(keyboard.keyDown(KeyEvent.VK_CONTROL))
			this.startShoot();
		else
			this.stopShoot();
		
		
		if(player_shoot_counter > 0)
			player_shoot_counter -= GAMESPEED;
		
		if(player_shoot && player_shoot_counter <= 0)
		{
			player_shoot_counter = player_shoot_delay;
			Projectile bullet = new Bullet();
			bullet.setX(player.getX() + 50);
			bullet.setY(player.getY() + 10);
			bullet.setDirection(player.getDirection());
			projectiles.add(bullet);
		}
		
		physicEngine.update();
		
		if(game_width == 0 && this.getWidth() > 0 && this.getHeight() > 0)
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
		
		// Updating projectiles
		int plimitR = this.getWidth() - offset_x;
		int plimitL = 0 - offset_x;
		for(int p = 0 ; p < projectiles.size() ; p++)
		{
			projectiles.get(p).update();
			int xp = projectiles.get(p).getX(); 
			if(xp > plimitR || xp < plimitL)
				projectiles.remove(p);
		}
		
		// Update enemies
			
			
		this.repaint();
	}
	
	private void startShoot()
	{
		player_shoot = true;
		this.player.setShoot(true);
	}
	
	private void stopShoot()
	{
		player_shoot = false;
		this.player.setShoot(false);
	}
	
	
	public void paintComponent(Graphics g) {
		
		Graphics2D g2d = (Graphics2D) g;
		// Draw background
		g2d.setColor(GameColor.white);
		g2d.fillRect(0, 0, this.getWidth(), this.getHeight());
		
		background.render(g2d, this.getWidth(), this.getHeight(), offset_x, offset_y);
		
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
		
		// Draw projectiles
		Projectile p;
		for(int i = 0 ; i < projectiles.size() ; i++)
		{
			p = projectiles.get(i);
			g2d.drawRect(p.getX() + offset_x, p.getY() + offset_y, p.getWidth(), p.getHeight());
		}
		// Draw debug info
		g2d.drawString("offset_x = " +String.valueOf(offset_x), 5, 20);
		g2d.drawString("offset_y = " +String.valueOf(offset_y), 5, 40);
	}

	
}
