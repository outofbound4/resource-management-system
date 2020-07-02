<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/ClassDataClass.php';

$ClassData_object_array = ClassData::getAllClassData();
HTML_table($ClassData_object_array,'deleteClassData','editClassData');
?>