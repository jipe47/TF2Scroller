<?php
/**
* Interface with the MySQL database.
* 
* @author Jean-Philippe Collette. 
* @package Core
* @subpackage Misc
*/
class SqlRequest
{
	/**
	* Number of request executed by the class.
	* @var int
	*/
	private $nbr_request = 0;
	
	/**
	* MySql ressource of the class.
	* @var MySQL ressource.
	*/
	private $link;
	
	/**
	* SQL requests executed by the class, for debug purpose.
	* @var string_array
	*/
	private $array_request = array();
	
	/**
	* Result of mysql_num_rows or mysql_affected_rows of the last request.
	* @var int
	*/
	private $nbr_response;
	
	// Exception value
	// Todo : virer cette vÃ©rification
	private $excpt = array("CURRENT_TIMESTAMP", "NULL");
	
	/**
	* Constructor. If no identification data are specified, connects by using hard coded data (see config/sql.php)
	* Params, in order: host, user, password, database.
	*/
	public function __construct()
	{
		if(func_num_args() == 4)
		{
			$args = func_get_args();
			$h = $args[0];
			$u = $args[1];
			$p = $args[2];
			$d = $args[3];
		}
		else
		{
			$b = $this->isLocal();
			
			$h = $b ? Config::getIni("transeo", "sql", "host_local")		: Config::getIni("transeo", "sql", "host");
			$u = $b ? Config::getIni("transeo", "sql", "user_local") 		: Config::getIni("transeo", "sql", "user");
			$p = $b ? Config::getIni("transeo", "sql", "password_local") 	: Config::getIni("transeo", "sql", "password");
			$d = $b ? Config::getIni("transeo", "sql", "database_local") 	: Config::getIni("transeo", "sql", "database");
		}
		
		$this->connect($h, $u, $p, $d);
	}
	
	/**
	* Establishes a connection to a specified MySQL server.
	* @param string $host MySQL host.
	* @param string $user MySQL user.
	* @param string $password MySQL password.
	* @param string $database MySQL database.
	*/
	public function connect($host, $user, $password, $database)
	{
		$this->link = mysql_connect($host, $user, $password, true);
		mysql_query("SET NAMES UTF8", $this->link);
		//mysql_query("SET GLOBAL group_concat_max_len=4096", $this->link); // In case of a huge number of criteria (when searching a contact)
		
		mysql_set_charset('utf8', $this->link);
		mysql_select_db($database, $this->link);
	}
	
	/**
	* Detects if the website is running in local or not.
	* @return boolean True if it is a local site, false otherwise.
	*/
	private function isLocal()
	{
		return (defined("FORCE_LOCAL") && FORCE_LOCAL) || in_array($_SERVER['SERVER_ADDR'], array("localhost", "127.0.0.1"));
	}
	
	/**
	* Displays a sql error.
	* @param string $sql The request that generates the error.
	*/
	public function displayError($sql = 'Unable to connect.')
	{
		$e = mysql_error($this->link);
		
		if(DEBUG)
			Log::add("MySQL error: " . $e . " (" . $sql  .")", Log::ERROR);
		
		echo '<div style="background-color: white; color: red; margin: auto; width: 75%; padding: 4px ; border: 1px red solid;">
					<p>SQL Error : : <strong>' . $e . '</strong></p>
					<p>Request : ' . $sql . '</p>
				</div>';
	}
	
	/**
	* Executes a request and return the result(s). If there are only two columns, if specified, returns an indexed array whose keys are values from one specified column.
	* @param string $sql The MySQL request.
	* @param string $index If the result of the request has only two columns, selects one of these columns and returns an indexed array based on that column.
	* @return string_array Array containing results of the request, or an indexed array if specified.
	*/
	public function fetchQuery($sql, $index = "", $removeIndex = true)
	{
		$request = $this->query($sql);
		$a = array();
		while($r = mysql_fetch_array($request))
		{
			if(count($r) == 4 && $index != "" && $removeIndex)
			{
				$i = $r[$index];

				unset($r[0]);
				unset($r[1]);
				unset($r[$index]);
								
				$a[$i] = array_pop($r);
				continue;
			}
			else
			{
				$t = array();
				
				foreach($r as $k => $v)
					if(!$removeIndex || ($removeIndex && $k != $index))
						$t[$k] = htmlspecialchars($v);
			}
						
			if($index != "")
				$a[$r[$index]] = $t;
			else
				$a[] = $t;
		}	
		return $a;
	}
	
	/**
	* Executes a MySQL request.
	* @param string $sql The request to execute.
	* @return ressource The MySQL result(s).
	*/
	public function query($sql)
	{
		$requete = mysql_query($sql,$this->link)or die($this->displayError($sql));
		$this->nbr_request++;
		$this->array_request[] = $sql;
		
		$a = explode(" ", $sql);
		$type = strtoupper($a[0]);
		
		if(in_array($type, array("INSERT", "UPDATE", "REPLACE", "DELETE")))
			$this->nbr_response = mysql_affected_rows($this->link);
		else
			$this->nbr_response = mysql_num_rows($requete);
		
		return $requete;
	}
	
	/**
	 * Returns the number of response due to the latest request.
	 * @return int The number of response.
	 */
	public function getNbrResponse()
	{
		return $this->nbr_response;
	}

	/**
	 * Returns the first response row of a MySQL request.
	 * @param string $sql SQL request.
	 * @return array First response.
	 */
	public function firstQuery($sql)
	{
		$r = $this->fetchQuery($sql);
		
		if($this->getNbrResponse() > 0)
			return $r[0];
		else
			return null;
	}
	
	/**
	 * Inserts a row in a MySQL table. 
	 * @param string $table MySQL table.
	 * @param string $values 
	 */
	public function insert($table, $values, $htmlspecialchars = false) // column => value
	{
		foreach($values as $c => $v)
		{
			if(in_array($v, $this->excpt))
				$values[$c] = $v;
			else if($htmlspecialchars)
				$values[$c] = "'".mysql_real_escape_string(htmlspecialchars($v))."'";
			else
				$values[$c] = "'".mysql_real_escape_string($v)."'";
			
		}
		
	
		return $this->query("INSERT INTO " . $table . " (".implode(",", array_keys($values)).") VALUES (".implode(",", array_values($values)).")");
	}
	
	/**
	* Inserts multiple entries in a MySQL table.
	* @param string $table Table name.
	* @param string_array $keys Keys specified in the third argument.
	* @param string_array_array Array of array containing values that will be inserted, respecting the order of keys. 
	*/
	public function insertAll($table, $keys, $values)
	{
		$keys = implode(",", $keys);
		
		foreach($values as $k => $v)
		{
			foreach($v as $i => $sv)
				if(!in_array($sv, $this->excpt))
					$v[$i] = "'".mysql_real_escape_string($sv)."'";
				
			$values[$k] = implode(",", $v);
		}	
		$values = implode("), (", $values);
		
		return $this->query("INSERT INTO " . $table . " (".$keys.") VALUES (".$values.")");
	}
	
	/**
	* Updates a table.
	* @param string $table Table name.
	* @param string $where The "WHERE" clause of the MySQL request.
	* @param array $values Associative array, containing keys and values that will be updated.
	*/
	public function update($table, $where, $values)
	{
		foreach($values as $k => $v)
		{
			if(in_array($v, $this->excpt))
				$values[$k] = " ".$k." = ".$v;
			else
				$values[$k] = " ".$k." = '" . mysql_real_escape_string($v) . "'";		
		}
		
		return $this->query("UPDATE " . $table . " SET ".implode(", ", array_values($values))." WHERE ".$where);		
	}
	
	/**
	* Counts every entries stored in a table.
	* @param string $table Table name.
	* @return int Number of entries in the specified table.
	*/
	public function countAll($table)
	{
		$count = $this->firstQuery("SELECT COUNT(*) as comptage FROM " . $table);
		return $count['comptage'];
	}
	
	/**
	* Counts entries that satisfy a WHERE clause.
	* @param string $table Table name.
	* @param $where WHERE clause that entries must satisfy.
	* @return int Number of entries in the specified table that satisfy the WHERE clause.
	* 
	*/
	public function count($table, $where = '')
	{
		if($where == '')
			return $this->countAll($table);
			
		$retour = $this->firstQuery("SELECT COUNT(*) as comptage FROM " . $table . " WHERE " . $where);
		return $retour['comptage'];
	}

	/**
	* Returns the result of mysql_insert_id.
	* @return Result of mysql_insert_id.
	*/
	public function getLastId()
	{
		return mysql_insert_id($this->link);
	}
	
	/**
	* Closes the MySQL connection.
	*/
	public function __destruct()
	{
		if(!empty($link))
			mysql_close($this->link);
	}
	
	/**
	* Returns requests that have been submited to an instance of the class.
	* @return string_array Requests submited to an instance of the class. 
	*/
	public function getRequests()
	{
		return $this->array_request;
	}
	
	/**
	* Returns the number of request submited to an instance of the class.
	* @return int Number of request submited to an instance of the class.
	*/
	public function getNbrRequest()
	{
		return $this->nbr_request;
	}
}
?>
