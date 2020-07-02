<?php
require_once root.'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/Session.php';
$session 	= new SessionManager();

class OrganisationPhoneData
{
	var $Phone_No;
	
	public static function getOrganisationPhoneData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM phoneno";	
		$result = $DB_CONN->query($sql);
		$data_array = array();	
		while($obj = $result->fetch_object())
		{
			$data_array[] = new OrganisationPhoneData($obj);
		}
		return $data_array;
	}	
	
	private function __construct($obj)
	{
		$this->Phone_No	 = $obj->phone; 
	}
}

?>