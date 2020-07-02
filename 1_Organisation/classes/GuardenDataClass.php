
<?php
require_once root . '1_Organisation/classes/BuildingDataClass.php';
require_once root . '1_Organisation/package/Session.php';
new SessionManager();

class GuardenData
{
	var $ID;
	var $NAME;
	var $BuildingData_object;

	private function __construct($obj)
	{
		$this->ID	 = $obj->idguarden; 
		$this->NAME = $obj->name;
		$this->BuildingData_object	 = BuildingData::getBuildingData($obj->Building_idbuilding);
	}
	
	public static function getAllGuardenData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM guarden";	
		$result = $DB_CONN->query($sql);
		$data_array = array();	
		while($obj = $result->fetch_object())
		{
			$data_array[] = new GuardenData($obj);
		}
		return $data_array;
	}

	public static function getGuardenData($idguarden)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM guarden where idguarden=$idguarden";	
		$result = $DB_CONN->query($sql);
		$data_array = array();	
		if($obj = $result->fetch_object())
		{
			return new GuardenData($obj);
		}
		return null;
	}
}

?>