<?php
//database

//database credentials
require('db_credentials.php');

/**
 *@author David Sampah
 *@version 1.1
 */
class db_connection
{
	//properties
	public $db = null;
	public $results = null;

	//connect
	/**
	*Database connection
	*@return bolean
	**/
	function db_connect(){
		//connection
		$this->db = mysqli_connect(servername,username,password,dbname);
		//test the connection
		if (mysqli_connect_errno()) {
			return false;
		}else{
			return true;
		}
	}

	//execute a query
	/**
	*Query the Database
	*@param takes a connection and sql query
	*@return bolean
	**/
	public function db_query($sqlQuery){
		if (!$this->db_connect()) {
			return false;
		}
		elseif ($this->db==null) {
			return false;
		}

		//run query
		$this->results = mysqli_query($this->db,$sqlQuery);
		if ($this->results == false) {
			return false;
		}else{
			return true;
		}

	}

	
	function db_query_ID($sqlQuery){
		if (!$this->db_connect()) {
			return false;
		}
		elseif ($this->db==null) {
			return false;
		}

		//run query
		$this->results = mysqli_query($this->db,$sqlQuery);
		if ($this->results == false) {
			return false;
		}else{
			$last_id = mysqli_insert_id($this->db);
			return $last_id;
		}

	}

	//fetch data
	/**
	*get select data
	*@return a record
	**/
	function db_fetch(){
		//check if result was set
		if ($this->results == null) {
			return false;
		}
		elseif ($this->results == false) {
			return false;
		}
		//return a record
		return mysqli_fetch_assoc($this->results);

	}
}
?>
