<?php
/*******************************************************************************
* for mapping class Rooms_idRooms	                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/MappedClassSectionDataClass.php';
require_once root . '1_Organisation/classes/MappedRoomClassClass.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$idrooms = $data["idrooms"];
$class_id = $data["class_id"];
$Section_id = $data["Section_id"];

$idMappedClassSection = MappedClassSectionData::getMappedClassSectionId($class_id, $Section_id);
	
$sql= "insert into map_room_class (idclass_sec,Rooms_idRooms) values($idMappedClassSection->ID,$idrooms)";
$DB_CONN->query($sql);
$MappedRoomClassData_object_array = MappedRoomClassData::getAllMappedRoomClassData();
HTML_MappedClassRoomInterface_Table($MappedRoomClassData_object_array);		
?>