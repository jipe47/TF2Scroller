package Sound;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

import javax.sound.sampled.AudioInputStream;
import javax.sound.sampled.AudioSystem;
import javax.sound.sampled.Clip;
import javax.sound.sampled.LineUnavailableException;
import javax.sound.sampled.UnsupportedAudioFileException;

import Game.Debug;

public class SoundLibrary {
	private static HashMap<String, ArrayList<Clip>> library;
	private static boolean isLoaded = false;
	private static SoundPool soundpool;
	
	public static void loadSound()
	{
		soundpool = new SoundPool(16);
		library = new HashMap<String, ArrayList<Clip>>();
		
		File soundFile = new File("assets/sound/sniper/smg_shoot.wav");
		AudioInputStream audioIn = null;
		ArrayList<Clip> al = new ArrayList<Clip>();
		int nbr_clip = 5;
		Clip clip = null;
		try {
			audioIn = AudioSystem.getAudioInputStream(soundFile);
			for(int i = 0 ; i < nbr_clip ; i++)
			{
				clip = AudioSystem.getClip();
				clip.open(audioIn);
				al.add(clip);
			}
		} catch (UnsupportedAudioFileException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (LineUnavailableException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		library.put("smg_shoot", al);
		
		isLoaded = true;
	}
	
	public static void playSound(String name)
	{
		if(!isLoaded)
			loadSound();
		
			ArrayList<Clip> al = library.get(name);
			for(int i = 0 ; i < al.size() ; i++)
				if(!al.get(i).isActive())
				{
					Debug.echo("Playing " + String.valueOf(i));
					al.get(i).stop();
					al.get(i).setFramePosition(0);
					al.get(i).start();
					break;
				}
	}
}
