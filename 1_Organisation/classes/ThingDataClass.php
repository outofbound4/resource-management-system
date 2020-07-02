
<?php
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/Session.php';
$session 	= new SessionManager();

class ThingData  
{
	var $ID, $NAME, $STATUS;

	private function __construct($obj)
	{
		$this->NAME	 = $obj->name;
		$this->ID = $obj->idthings;
		$this->STATUS = $obj->r_status;
	}
	
	public static function getAllThingData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * from things";
		//exit($sql);
		
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($obj = $result->fetch_object())
		{
			$data_array[] = new ThingData($obj);
		}
		return $data_array;
	}

	public static function getThingData($idthings)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * from things where idthings=$idthings";
		//exit($sql);
		
		$result = $DB_CONN->query($sql);
		if($obj = $result->fetch_object())
		{
			return new ThingData($obj);
		}
		return null;
	}

	public static function getThingDataCount()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT COUNT(idthings) AS noOfThings FROM things";
		$result = $DB_CONN->query($sql);
		return $result->fetch_object();
	}

	public static function getThingDataByMonthYear($month,$year)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * from things where MONTH(date)=$month AND YEAR(date) = $year";
		//exit($sql);
		
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($obj = $result->fetch_object())
		{
			$data_array[] = new ThingData($obj);
		}
		return $data_array;
	}

	public static function getThingDataCountOfCurrentMonth($month,$year)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT  COUNT(idthings) AS noOfThings FROM things where MONTH(date)=$month AND YEAR(date) = $year";
		$result = $DB_CONN->query($sql);
		return $result->fetch_object();
	}
	
}

?>