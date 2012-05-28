package Physic;

import java.util.ArrayList;

public class PhysicEngine {
	
	public static final int DT = 1;
	
	private ArrayList<Entity> entities;
	
	public PhysicEngine()
	{
		entities = new ArrayList<Entity>();
	}
	
	public void addEntity(Entity e)
	{
		entities.add(e);
	}
	
	public void update()
	{
		
		// Update entities' position
		for(int i = 0 ; i < entities.size() ; i++)
			updatePosition(entities.get(i));
				
		// Check for collisions
		Entity e;
		Entity f;
		
		boolean bottomCollision;
		for(int i = 0 ; i < entities.size(); i++)
		{
			e = entities.get(i);
			if(e.isStatic())
				continue;
			bottomCollision = false;
			
			for(int j = 0; j < entities.size() ; j++)
			{
				if(j == i)
					continue;
				
				f = entities.get(j);
				if(e.collide(f))
				{
					//Debug.echo(String.valueOf(e.getUid()) + " collides with " + String.valueOf(f.getUid()));
						
					boolean oT = e.onTopOf(f);
					boolean oB = e.onBottomOf(f);
					
					bottomCollision |= oT;
					
					boolean oL = e.onLeftOf(f);
					boolean oR = e.onRightOf(f);
					
					
					if(oT)
					{
						//Debug.echo("onTop");
						e.setY(f.getY() - e.getHeight());
						e.setDy(0);
						e.setDdy(0);
					}
					else if(oB)
					{
						//Debug.echo("onBottom");
						e.setY(f.getY() + f.getHeight());
					}
					else if(oL)
					{
						//Debug.echo("onLeft");
						e.setX(f.getX() - e.getWidth());
						e.setDx(0);
						e.setDdx(0);
					}
					else if(oR)
					{
						//ce.setX(cf.getX() + ce.gethWidth());
						//Debug.echo("onRight");
						e.setX(f.getX() + f.getWidth());
						e.setDx(0);
						e.setDdx(0);
					}
				}
			}
		
			if(!bottomCollision)
			{
				e.setDdy(-1);
			}
			else
			{
				e.setDdy(0);
			}
			
			
		}
		
		
	}
	
	public void updatePosition(Entity e)
	{
		if(e.isStatic())
			return;
		
		e.setDx(Math.min(e.getDx() + DT * e.getDdx(), e.getMaxDx()));
		e.setDy(e.getDy() + DT * e.getDdy());
		
		e.setX(e.getX() + DT *  e.getDx() * e.getDirection());
		e.setY(e.getY() - DT *  e.getDy());
	}
	
}
