<?php
/*******************************************************************************
* For adding class Name				                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/ClassDataClass.php';
require_once root . 'config/ClassConnectDB.php';

	$Form = new Forms();
	$data = $Form->getFormData();
	$sql = "select name from class where name='".$data['name']."'";
	$result = $DB_CONN->query($sql);
	
	if(!$result->fetch_object())
	{
		unset($sql);
		$sql=$DB_CONN->get_insert_sql("class");
		$DB_CONN->query($sql);
		
		$ClassData_object_array = ClassData::getAllClassData();
		
		HTML_table($ClassData_object_array,'deleteClassData','editClassData');
	}
	else
		echo "exist";
?>