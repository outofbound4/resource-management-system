<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/ClassDataClass.php';
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$sql = "DELETE FROM class WHERE class_id = ".$data['class_id'];
if($DB_CONN->query($sql) == true)
{
	$ClassData_object_array = ClassData::getAllClassData();
	HTML_table($ClassData_object_array,'deleteClassData','editClassData');
}
else
	echo $DB_CONN->error();
?>