<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/MappedClassSectionDataClass.php';
$session = new SessionManager();
$ClassData_object_array = ClassData::getAllClassData();
HTML_select($ClassData_object_array,'Class_idClass','Class_idClass','afterClassSelect_mapSectionClassInterface()');
?>