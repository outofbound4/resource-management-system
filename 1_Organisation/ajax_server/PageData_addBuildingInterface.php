<?php
/*******************************************************************************
* page Data Building Interface		                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';

$session = new SessionManager();
$BuildingData_object_array = BuildingData::getAllBuildingData();

HTML_table($BuildingData_object_array,'deleteBuilding','editBuilding');
?>