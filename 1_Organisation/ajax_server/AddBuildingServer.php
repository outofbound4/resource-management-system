<?php
/*******************************************************************************
* For adding Building Name			                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';

$session 		= new SessionManager();
$formData 		= new Forms();
$data 			= $formData->getFormData();
$BuildingName 	= $data["name"];
	
$sql 			= "select name from building where name='$BuildingName'";
$result 		= $DB_CONN->query($sql);
	
if(!$result->fetch_object())
{
	unset($sql);
	$sql=$DB_CONN->get_insert_sql("building");
	$DB_CONN->query($sql);
		
	$BuildingData_object_array = BuildingData::getAllBuildingData();
		
	HTML_table($BuildingData_object_array,'deleteBuilding','editBuilding');
}
else
	echo "exist";
?>