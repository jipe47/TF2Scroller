package Gui;

import java.awt.Dimension;

import javax.swing.JFrame;
import javax.swing.JPanel;

import Game.Game;

public class Window extends JFrame {

	private static final long serialVersionUID = -8255319694373975038L;

	private JPanel game;

	public Window() {
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
