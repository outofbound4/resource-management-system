<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/UndistributedThingDataClass.php';
require_once root . '1_Organisation/classes/ThingsInBuildingDataClass.php';


$session 				= new SessionManager();
$formData 				= new Forms();
$data 					= $formData->getFormData();
$Things_idthings 		= $_POST['Things_idthings'];
$Building_idbuilding 	= $_POST['Building_idbuilding'];

$sql = "DELETE FROM b_distribution WHERE Things_idthings = $Things_idthings AND Building_idbuilding = $Building_idbuilding";
if($DB_CONN->query($sql) == true)
{
	$UndistributedThingData_object_array = UndistributedThingData::getUndistributedThingData();
	$ThingsInBuildingData = ThingsInBuildingData::getAllThingsInBuildingData();
	HTML_select($UndistributedThingData_object_array,'Things_idthings','Things_idthings');
	echo ",,";
	HTML_Mapped_Table($ThingsInBuildingData, 'deleteThingsInBuilding');
}
else
	echo $DB_CONN->error();
