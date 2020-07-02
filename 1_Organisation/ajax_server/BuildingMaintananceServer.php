<?php
/*******************************************************************************
* Building Maintanance Server		                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/BuildingMaintananceDataClass.php';

new SessionManager();

$sql=$DB_CONN->get_insert_sql("maintanance");
$DB_CONN->query($sql);
		
$BuildingMaintananceData_object_array = BuildingMaintananceData::getAllBuildingMaintananceData();
HTML_table_BuildingMaintanance($BuildingMaintananceData_object_array);
?>