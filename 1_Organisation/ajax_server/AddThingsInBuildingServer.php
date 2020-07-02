<?php
/*******************************************************************************
* For adding Thing in Building		                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/UndistributedThingDataClass.php';
require_once root . '1_Organisation/classes/ThingsInBuildingDataClass.php';


$session 	= new SessionManager();
$sql=$DB_CONN->get_insert_sql("b_distribution");
$DB_CONN->query($sql);

$UndistributedThingData_object_array = UndistributedThingData::getUndistributedThingData();
$ThingsInBuildingData = ThingsInBuildingData::getAllThingsInBuildingData();
HTML_select($UndistributedThingData_object_array,'Things_idthings','Things_idthings');
echo ",,";
HTML_Mapped_Table($ThingsInBuildingData, 'deleteThingsInBuilding');
?>