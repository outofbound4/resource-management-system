<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/GuardenDataClass.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$idguarden 	= $data['idguarden'];
$sql = "DELETE FROM guarden WHERE idguarden = $idguarden";
if($DB_CONN->query($sql) == true)
{
	$GuardenData_object_array = GuardenData::getAllGuardenData();
	HTML_table_GurdenData($GuardenData_object_array);
}
else
	echo $DB_CONN->error();
?>