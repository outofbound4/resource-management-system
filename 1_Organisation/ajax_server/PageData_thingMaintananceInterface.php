<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/ThingMaintananceDataClass.php';
require_once root . '1_Organisation/classes/ThingDataClass.php';

new SessionManager();

$ThingData_object_array = ThingData::getAllThingData();
$ThingMaintananceData_object_array = ThingMaintananceData::getAllThingMaintananceData();
HTML_select($ThingData_object_array,'Things_idthings','Things_idthings');
echo ",";
HTML_table_ThingRepair($ThingMaintananceData_object_array);

?>