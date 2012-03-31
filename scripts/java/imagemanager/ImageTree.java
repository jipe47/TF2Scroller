package imagemanager;

import javax.swing.tree.DefaultMutableTreeNode;

public class ImageTree {
	private TreeNode root;
	
	public ImageTree()
	{
		reset();
	}
	
	public void insertIntoTree(DefaultMutableTreeNode root)
	{
		this.root.insertIntoTree(root);
	}
	
	public void reset()
	{
		root = new TreeNode("Root");
	}
	
	public void addNode(String path, ImageInfo img)
	{
		String[] folders = path.split("/");
		root.addNode(folders, img, 0);
	}
	
}
