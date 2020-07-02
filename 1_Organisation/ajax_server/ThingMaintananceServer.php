<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/ThingMaintananceDataClass.php';
new SessionManager();

$sql=$DB_CONN->get_insert_sql("repair");
$DB_CONN->query($sql);
		
$ThingMaintananceData_object_array = ThingMaintananceData::getAllThingMaintananceData();
HTML_table_ThingRepair($ThingMaintananceData_object_array);
?>