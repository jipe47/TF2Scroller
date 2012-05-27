package Sound;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.concurrent.ArrayBlockingQueue;
import java.util.concurrent.ThreadPoolExecutor;
import java.util.concurrent.TimeUnit;

import javax.sound.sampled.AudioInputStream;
import javax.sound.sampled.AudioSystem;
import javax.sound.sampled.Clip;
import javax.sound.sampled.LineUnavailableException;
import javax.sound.sampled.UnsupportedAudioFileException;

import Game.Debug;

public class SoundLibrary {
	private static HashMap<String, AudioInputStream> library;
	private static boolean isLoaded = false;
	private static ThreadPoolExecutor soundpool;
	
	private static int poolSize = 10;
    private static int maxPoolSize = 20;
    private static long keepAliveTime = 100;
	private final static ArrayBlockingQueue<Runnable> queue = new ArrayBlockingQueue<Runnable>(
            5);
	
	public static void loadSound()
	{
		soundpool = new ThreadPoolExecutor(poolSize, maxPoolSize, keepAliveTime, TimeUnit.SECONDS, queue);
		
		library = new HashMap<String, AudioInputStream>();
		
		File soundFile = new File("assets/sound/sniper/smg_shoot.wav");
		AudioInputStream audioIn = null;
		try {
			audioIn = AudioSystem.getAudioInputStream(soundFile);
		} catch (UnsupportedAudioFileException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		library.put("smg_shoot", audioIn);
		
		
		soundFile = new File("assets/sound/sniper/smg_shoot2.wav");
		try {
			audioIn = AudioSystem.getAudioInputStream(soundFile);
		} catch (UnsupportedAudioFileException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		library.put("smg_shoot2", audioIn);
		
		isLoaded = true;
	}
	
	public static void playSound(String name)
	{
		if(!isLoaded)
			loadSound();
		
		soundpool.execute(new SoundWorker(library.get(name)));
	}
}
