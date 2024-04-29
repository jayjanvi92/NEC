<?php
class dbConnect
{
	
	var $mysqlHostName	= "localhost";
	var $mysqlUserName	= "root";
	var $mysqlDbName	= "test";
	var $mysqlPassword	= "";

	function dbMysqlConnect()
	{

			$this->mysqlHostName	= "localhost";
			$this->mysqlUserName	= "root";
			$this->mysqlPassword	= "";
			$this->mysqlDbName		= "test";

			try
			{
				$this->dbc		= new PDO('mysql:dbname='.$this->mysqlDbName.';host='.$this->mysqlHostName.'', $this->mysqlUserName, $this->mysqlPassword);
				$this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->dbc->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true); 
				return $this->dbc;
			}//try
			catch (PDOException $e)
			{
				echo "Error:-Could not connect to the database".$e->getMessage();
				die();
			}//catch (PDOException $e)
	}//function dbMysqlConnect()

}//class dbConnect

?>