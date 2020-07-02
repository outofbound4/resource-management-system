<?php
require_once root . '1_Organisation/package/Session.php';
require_once root . 'config/ClassConnectDB.php';
$session = new SessionManager();
class OrganisationData  
{
	var $ID;
	var $NAME;
	var $ADDRESS;
	var $LAND;
	
	private function __construct($obj)
	{
		$this->ID	 = $obj->idorganisation;
		$this->NAME = $obj->name;
		$this->ADDRESS = $obj->address;
		$this->LAND = $obj->land;
		
	}

	public static function getAllOrganisationData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM organisation";
		//exit($sql);
		
		$result = $DB_CONN->query($sql);
		$array_subjects = array();	
		while($obj = $result->fetch_object())
		{
			$array_object[] = new OrganisationData($obj);
		}
		return $array_object;
	}
	public static function getOrganisationData($idorganisation)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM organisation where idorganisation=$idorganisation";
		//exit($sql);
		$result = $DB_CONN->query($sql);

		if($obj = $result->fetch_object())
		{
			return new OrganisationData($obj);
		}
		return null;
	}
}

?>