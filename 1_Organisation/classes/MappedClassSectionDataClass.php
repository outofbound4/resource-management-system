<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/classes/ClassDataClass.php';
require_once root . '1_Organisation/classes/SectionDataClass.php';
$session = new SessionManager();
class MappedClassSectionData
{
	var $ID;
	var $ClassData_object;
	var $SectionData_object;
	
	public function __construct($row) 
	{
		$this->ID = $row->idclass_sec;
		$this->ClassData_object = ClassData::getClassData($row->Class_idClass);
		$this->SectionData_object = SectionData::getSectionData($row->Section_Section_id);
	}
	
	public static function getAllMappedClassSectionData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * from map_class_section ";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new MappedClassSectionData($row);
		}	
		return $data_array;
	}

	public static function getMappedClassSectionData($idclass_sec)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * from map_class_section where idclass_sec='$idclass_sec'";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		if($row = $result->fetch_object())
		{
			return new MappedClassSectionData($row);
		}	
		return null;
	}

	public static function getMappedSections_Of_Class($idClass)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * from map_class_section where Class_idClass='$idClass'";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new MappedClassSectionData($row);
		}	
		return $data_array;
	}

	public static function getMappedClassSectionId($idClass,$idsection)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * from map_class_section where Class_idClass=$idClass AND Section_Section_id=$idsection";
		$result = $DB_CONN->query($sql);
		$data_array = array();
		if($row = $result->fetch_object())
		{
			return new MappedClassSectionData($row);
		}	
		return null;
	}	
}

?>