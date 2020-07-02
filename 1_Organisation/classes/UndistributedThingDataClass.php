<?php
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/Session.php';
$session 	= new SessionManager();

class UndistributedThingData
{
	var $ID, $NAME;
	
	public static function getUndistributedThingData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT idthings, name FROM things where (idthings) NOT IN (select Things_idthings from r_distribution) AND (idthings) NOT IN (select Things_idthings from b_distribution)";
		
		$result = $DB_CONN->query($sql);
		$data_array = array();	
		while($obj = $result->fetch_object())
		{
			$data_array[] = new UndistributedThingData($obj);
		}
		return $data_array;
	}	
	
	private function __construct($obj)
	{
		$this->ID	 = $obj->idthings; 
		$this->NAME = $obj->name;	
	}
	
}

?>