<?php
/**
 * Implementation of a Deque datastructure.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Datastructures
 */
class Deque
{
	private $objects = array();
	private $nbrObject = 0;
	
	public function __construct()
	{
	}
	
	/**
	 * Checks if the deque is empty.
	 * @return True if the deque is empty, false otherwise.
	 */
	public function isEmpty()
	{
		return $this->nbrObject == 0;
	}
	
	/**
	 * Returns and remove the head of the deque.
	 * @return mixed Head of the deque.
	 */
	public function pop()
	{
		$this->nbrObject--;
		return array_shift($this->objects);
	}
	
	/**
	 * Returns the head of the deque, without removing it.
	 * @return mixed Head of the deque.
	 */
	public function top()
	{
		return $this->objects[0];
	}
	
	/**
	 * Inserts an object at the top of the deque.
	 * @param mixed $o The object to push.
	 */
	public function push($o)
	{
		$this->nbrObject++;
		array_unshift($this->objects, $o);
	}
	
	/**
	 * Returns the head of the deque, without removing it.
	 * @return Head of the deque.
	 */
	public function front()
	{
		return $this->top();
	}
	
	/**
	 * Adds an object at the end of the deque.
	 * @param mixed $o Object to add.
	 */
	public function enqueue($o)
	{
		$this->nbrObject++;
		$this->objects[] = $o;
	}
	
	/**
	 * Returns and removes the head of the deque.
	 * @return mixed
	 */
	public function dequeue()
	{
		$this->nbrObject--;
		return array_pop($this->objects);
	}
	
	/**
	 * Returns the number of element in the deque.
	 * @return Number of element in the deque.
	 */
	public function size()
	{
		return $this->nbrObject;
	}
}

?>