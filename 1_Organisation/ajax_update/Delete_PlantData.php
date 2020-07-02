<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/PlantDataClass.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$idplant 	= $data['idplant'];
$sql = "DELETE FROM plant WHERE idplant = $idplant";
if($DB_CONN->query($sql) == true)
{
	$PlantData_object_array = PlantData::getAllPlantData();
	HTML_table_PlantData($PlantData_object_array);
}
else
	echo $DB_CONN->error();
?>
