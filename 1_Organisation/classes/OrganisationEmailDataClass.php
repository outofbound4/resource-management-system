
<?php
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/Session.php';
$session 	= new SessionManager();

class OrganisationEmailData
{
	var $Email_ID;
	
	public static function getOrganisationEmailData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM email";	
		$result = $DB_CONN->query($sql);
		$object_array = array();	
		while($obj = $result->fetch_object())
		{
			$object_array[] = new OrganisationEmailData($obj);
		}
		return $object_array;
	}	
	
	private function __construct($obj)
	{
		$this->Email_ID	 = $obj->emailId; 
	}
}

?>