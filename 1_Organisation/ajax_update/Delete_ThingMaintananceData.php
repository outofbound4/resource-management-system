<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/ThingMaintananceDataClass.php';

new SessionManager();

$formData 	= new Forms();
$data 		= $formData->getFormData();
$idrepair 	= $data['idrepair'];

$sql = "DELETE FROM repair WHERE idrepair = $idrepair";
if($DB_CONN->query($sql) == true)
{
	$ThingMaintananceData_object_array = ThingMaintananceData::getAllThingMaintananceData();
	HTML_table_ThingRepair($ThingMaintananceData_object_array);
}
else
	echo $DB_CONN->error();

?>