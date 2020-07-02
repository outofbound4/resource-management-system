<?php
/*******************************************************************************
* For adding Guarden Name			                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/GuardenDataClass.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$name = $data["name"];
$idbuilding = $data["Building_idbuilding"];
	
$sql = "select * from guarden where name='$name' AND Building_idbuilding='$idbuilding'";
$result = $DB_CONN->query($sql);
	
if(!$result->fetch_object())
{
	unset($sql);
	$sql=$DB_CONN->get_insert_sql("guarden");
	$DB_CONN->query($sql);
		
	$GuardenData_object_array = GuardenData::getAllGuardenData();
		
	HTML_table_GurdenData($GuardenData_object_array);
}
else
	echo "exist";
?>