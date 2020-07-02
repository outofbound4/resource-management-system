<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/BuildingMaintananceDataClass.php';

$session 		= new SessionManager();
$formData 		= new Forms();
$data 			= $formData->getFormData();
$idmaintanance 	= $data['idmaintanance'];

$sql = "DELETE FROM maintanance WHERE idmaintanance = $idmaintanance";
if($DB_CONN->query($sql) == true)
{
	$BuildingMaintananceData_object_array = BuildingMaintananceData::getAllBuildingMaintananceData();
	HTML_table_BuildingMaintanance($BuildingMaintananceData_object_array);
}
else
	echo $DB_CONN->error();

?>
