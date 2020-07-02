<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/ThingDataClass.php';


$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$idthings 	= $data['idthings'];
$sql 		= "DELETE FROM things WHERE idthings = $idthings";
if($DB_CONN->query($sql) == true)
{
	$ThingData_object_array = ThingData::getAllThingData();
	HTML_table($ThingData_object_array,'deleteThingData', 'editThingData');
}
else
	echo $DB_CONN->error();
?>