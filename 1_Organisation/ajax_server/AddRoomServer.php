<?php
/*******************************************************************************
* For adding Room Name				                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/RoomDataClass.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$RoomName 	= $data["name"];
$idbuilding = $data["Building_idbuilding"];
		
$sql 		= "select name, Building_idbuilding from rooms where name='$RoomName' and Building_idbuilding='$idbuilding'";
$result 	= $DB_CONN->query($sql);

if(!$result->fetch_object())
{
	unset($sql);
	$sql=$DB_CONN->get_insert_sql("rooms");
	$DB_CONN->query($sql);
	
	$RoomData_object_array = RoomData::getAllRoomData();
		
	HTML_table_AddRoomData($RoomData_object_array);
}
else
	echo "exist";
?>