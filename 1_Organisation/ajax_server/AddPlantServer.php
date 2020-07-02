<?php
/*******************************************************************************
* For adding Plant Name				                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/PlantDataClass.php';
new SessionManager();

$sql=$DB_CONN->get_insert_sql("plant");
//exit($sql);
$DB_CONN->query($sql);
$PlantData_object_array = PlantData::getAllPlantData();
HTML_table_PlantData($PlantData_object_array);
?>