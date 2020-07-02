
<?php
require_once root . '1_Organisation/classes/DepartmentDataClass.php';
require_once root . '1_Organisation/package/Session.php';
$session 	= new SessionManager();

class DepartmentPhoneData
{
	var $PHONE;
	var $DEPARTMENT_OBJECT;
	
	private function __construct($obj)
	{
		$this->PHONE	 = $obj->phone;
		$this->DEPARTMENT_OBJECT = DepartmentData::getDepartmentData($obj->Department_iddepartment);
	}

	public static function getAllDepartmentPhoneData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM dpt_phoneno";
		$result = $DB_CONN->query($sql);
		$data_array = array();	
		while($obj = $result->fetch_object())
		{
			$data_array[] = new DepartmentPhoneData($obj);
		}
		return $data_array;
	}

	public static function getDepartmentPhoneData($iddepartment)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM dpt_phoneno where Department_iddepartment = $iddepartment";	
		exit($sql);
		$result = $DB_CONN->query($sql);	
		if($obj = $result->fetch_object())
		{
			return new DepartmentPhoneData($obj);
		}
		return $data_array;
	}	
}

?>