package Sound;

import java.util.ArrayList;

public class SoundPool {
	private ArrayList<SoundWorker> workers;
	
	public SoundPool(int nbr_thread)
	{
		workers = new ArrayList<SoundWorker>();
		
		for(int i = 0 ; i < nbr_thread ; i++)
			workers.add(new SoundWorker());
	}
	
	public void playSound()
	{
		for(int i = 0 ; i < workers.size() ; i++)
		{
		}
	}
}
