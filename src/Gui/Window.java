package Gui;

import java.awt.Dimension;

import javax.swing.JFrame;

import Game.Game;

@SuppressWarnings("serial")
public class Window extends JFrame {
	
	private Game game;
	
	public Window()
	{
		this.setTitle("TF2Scroller");
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

		game = new Game();
		this.setContentPane(game);
		
		this.setPreferredSize(new Dimension(900, 675));
		
		this.setResizable(true);
		this.setVisible(true);
		this.pack();
		this.setLocationRelativeTo(null);
	}

}
