<?php
/**
 * Allows the computation of the duration of a script. You can start a
 * chronometer for different scripts by specifying different names.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Misc
 */
class Chrono
{
	private $array_chrono_start = array();
	private $array_chrono_stop = array();

	private $previous_name = '';

	public function __construct()
	{
	}

	/**
	 * Starts a chronometer.
	 * @param string $name Name of the chronometer. If not set, uses a GUID.
	 * @throws Exception Throwned if the name is not unique.
	 */
	public function start($name = '')
	{
		if($name == '')
			$name = generateId();

		if(!array_key_exists($name, $this->array_chrono_start) && !array_key_exists($name, $this->array_chrono_stop))
		{
			$this->previous_name = $name;
			$this->array_chrono_start[$name] = microtime(true);
		}
		else
			throw new Exception("Chrono name already exists : " . $name);
	}

	/**
	 * Stops a chronometer.
	 * @param string $name Name of the chronometer to stop. If not set, uses
	 * the most recently started chronometer.
	 * @throws Exception Throwned if the chronometer does not exist.
	 */
	public function stop($name = '')
	{
		if($name == '')
			$name = $this->previous_name;

		if(!array_key_exists($name, $this->array_chrono_start))
			throw new Exception("Chrono name does not exist : ".$name.".");
			
		$t = microtime(true) - $this->array_chrono_start[$name];
		$this->array_chrono_stop[$name] = $t;
		unset($this->array_chrono_start[$name]);
		return $t;
	}

	/**
	 * Returns times computed by every chronometers of the instance.
	 * @param boolean $stopAll If set, stops chronometers that have not been stopped.
	 * @return Array where keys are chronometers'name and values the computed times.
	 */
	public function getTimes($stopAll = true)
	{
		if($stopAll)
			foreach($this->array_chrono_start as $name => $s)
			{
				try{
					$this->stop($name);
				}
				catch(Exception $e){
				}
			}
			return $this->array_chrono_stop;
	}
}
?>