
<?php
require_once root . '1_Organisation/classes/GuardenDataClass.php';
require_once root . '1_Organisation/package/Session.php';
new SessionManager();

class PlantData  
{
	var $ID;
	var $NAME;
	var $GaurdenData_object;
	
	private function __construct($obj)
	{
		$this->ID = $obj->idplant;
		$this->NAME = $obj->plant;
		$this->GaurdenData_object	 = GuardenData::getGuardenData($obj->Guarden_idguarden);
	}

	public static function getAllPlantData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM  plant";
		$result = $DB_CONN->query($sql);
		$data_array = array();	
		while($obj = $result->fetch_object())
		{
			$data_array[] = new PlantData($obj);
		}
		return $data_array;
	}	
	
}

?>