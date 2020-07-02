<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/SectionDataClass.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$Section_id 		= $data['Section_id'];
$sql = "DELETE FROM section WHERE Section_id = $Section_id";
if($DB_CONN->query($sql) == true)
{
	$SectionData_object_array = SectionData::getAllSectionData();
	HTML_table($SectionData_object_array,'deleteSectionData','editSectionData');
}
else
	echo $DB_CONN->error();
?>