<?php
/*******************************************************************************
* For adding Section Name				                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/SectionDataClass.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$SectionName = $data["name"];
	
$sql = "select name from section where name='$SectionName'";
$result = $DB_CONN->query($sql);
	
if(!$result->fetch_object())
{
	unset($sql);
	$sql=$DB_CONN->get_insert_sql("section");
	$DB_CONN->query($sql);
		
	$SectionData_object_array = SectionData::getAllSectionData();
		
	HTML_table($SectionData_object_array,'deleteSectionData','editSectionData');
}
else
	echo "exist";
?>