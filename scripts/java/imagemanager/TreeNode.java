package imagemanager;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

import javax.swing.tree.DefaultMutableTreeNode;

public class TreeNode implements Comparable {

	private ImageInfo img;
	private String name;
	private ArrayList<TreeNode> children;
	
	public TreeNode(ImageInfo img)
	{
		this.img = img;
		children = new ArrayList<TreeNode>();
	}
	
	public TreeNode(String s)
	{
		children = new ArrayList<TreeNode>();
		name = s;
	}
	
	public void addChildren(String s)
	{
		this.children.add(new TreeNode(s));
	}
	public void addChildren(ImageInfo img)
	{
		this.children.add(new TreeNode(img));
	}
	
	public String getName()
	{
		if(img != null)
			return img.getName();
		else
			return name;
	}
	
	public boolean isDir()
	{
		return img == null;
	}

	public int compareTo(Object arg0) {
		String name1 = ((TreeNode) arg0).getName();
		return name1.compareTo(this.getName());
	}

	public void insertIntoTree(DefaultMutableTreeNode node)
	{
		Collections.sort((List<TreeNode>)children);
		
		DefaultMutableTreeNode p;
		for(TreeNode n : children)
		{
			p = new DefaultMutableTreeNode(n.getName());
			n.insertIntoTree(p);
			node.add(p);
		}
	}
	
	public void addNode(String[] path, ImageInfo img, int index)
	{
		if(path.length - index == 0)
			this.addChildren(img);
		else
		{
			for(TreeNode n : children)
			{
				if(n.getName().equals(path[index]))
				{
					n.addNode(path, img, index + 1);
					return;
				}
			}
			
			// The folder does not exist
			this.addChildren(path[index]);
			children.get(children.size() - 1).addNode(path, img, index + 1);
			
		}
	}
}
