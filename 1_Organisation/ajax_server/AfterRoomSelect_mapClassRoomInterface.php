<?php
/*******************************************************************************
* After Room Select in mapClassRoomInterface.php                               *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/ClassDataClass.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$idbuilding = $data['building_idbuilding'];
$ClassData_object_array = ClassData::getAllClassData($idbuilding);
HTML_select($ClassData_object_array,'class_id','class_id', 'afterClassSelect_inMapRoomClassInterface()');
?>