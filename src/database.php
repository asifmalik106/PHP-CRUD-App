<?php
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'student');
	define('DB_USER', 'root');
	define('DB_PASS', '');

/* Class: database
 * Author: Asif Salman Malik
 * Description: Manage Database connection and execute and fetch queries.
 */
class database
{
	private $conn;

	function __construct()
	{
		$this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	public function execute($sql)
	{
		if ($this->conn->query($sql) == TRUE) {
    		return TRUE;
		} else {
		   	return FALSE;
		}
	}

	public function fetch($sql)
	{
		return $this->conn->query($sql);
	}
	
}