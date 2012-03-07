<?php
/**
 * Represents a tree. Each node is identified by an ID and contains a value. The parent of a node can be defined arbitrary.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Datastructures
 */
class Tree
{
	private $root;
	private $nbr_element = 0;
	
	public function __construct()
	{
		$this->root = new TreeNode();
	}
	
	public function addAll($a)
	{
		$nbr = count($a);
		while($nbr > 0)
		{
			$v = $a[0];
			$a = array_slice($a, 1);
			
			if($this->addNode($v['id'], $v['value'], $v['id_parent']))
				$nbr--;
			else
				$a[] = $v;
		}
	}
	
	public function addNode($id, $value, $id_parent)
	{
		if(is_null($id_parent))
			$id_parent = 0;
			
		$b = $this->root->addNode($id, $value, $id_parent);
		return $b;
	}
	
	public function getArray($id_skip = -1)
	{
		return $this->root->getArray($id_skip);
	}
	
	public function getLeavesPath()
	{
		return $this->root->getLeavesPath(array());
	}
}

class TreeNode
{
	public $id, $value, $children, $level;
	
	public function __construct($id = 0, $value = "", $level = 0)
	{
		$this->id = $id;
		$this->value = $value;
		$this->children = array();
		$this->level = $level;
	}
	
	public function getLeavesPath($a)
	{
		//echo '<h1>getLeavesPath('.serialize($a).') dans '.$this->id.'</h1>';
		if(count($this->children) == 0)
		{
			//echo '<h2>Feuille: '.$this->id.'</h2>';
			return array('id' => $this->id, 'path' => $a); 
		}	
		else
		{
			$r = array();
			
			if($this->id != 0)
			{
				$r[] = array('id' => $this->id, 'path' => $a);
				$a[] = array('id' => $this->id, 'value' => $this->value);
			}
			
			foreach($this->children as $c)
			{
				$p = $c->getLeavesPath($a);
				if(array_key_exists('id', $p))
				{
					$r[] = $p;
				}
				else
				{
					$r = array_merge($r, $p);
				}
			}
			return $r;
		}
	}
	
	public function getArray($id_skip)
	{
		$a = array('id' => $this->id, 'value' => $this->value, 'children' => array(), 'level' =>  $this->level);
		
		foreach($this->children as $c)
			if($c->id != $id_skip)
				$a['children'][] = $c->getArray($id_skip);
		return $a;
	}
	
	
	public function addNode($id, $value, $id_parent, $level = 0)
	{
		if($this->id == $id_parent)
		{
			$this->children[] = new TreeNode($id, $value, $this->level + 1);
			return true;
		}
		$b = false;
		foreach($this->children as $c)
			$b = $b || $c->addNode($id, $value, $id_parent);
	
		return $b;
	}
	
	public function hasChildren()
	{
		return count($this->children) > 0;
	}
	
	public function addChild($node)
	{
		$this->children[] = $node;
	}
	
}