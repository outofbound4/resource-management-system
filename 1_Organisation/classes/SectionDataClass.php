<?php
require_once root . '1_Organisation/package/Session.php';
require_once root . 'config/ClassConnectDB.php';
$session = new SessionManager();

class SectionData
{
	var $ID;
	var $NAME;
	
	public function __construct($row) 
	{
		$this->ID = $row->ID;
		$this->NAME =  $row->NAME;
	}
	
	public static function getAllSectionData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT Section_id AS ID, name AS NAME FROM section";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new SectionData($row);
		}	
		return $data_array;
	}
	public static function getSectionData($section_id)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT Section_id AS ID, name AS NAME FROM section where Section_id=$section_id";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		if($row = $result->fetch_object())
		{
			return new SectionData($row);
		}	
		return null;
	}
}
?>