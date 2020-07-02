<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/PlantDataClass.php';
require_once root . '1_Organisation/classes/GuardenDataClass.php';

new SessionManager();

$GuardenData_object_array = GuardenData::getAllGuardenData();
$PlantData_object_array = PlantData::getAllPlantData();
HTML_select($GuardenData_object_array,'Guarden_idguarden','Guarden_idguarden');
echo ",,";
HTML_table_PlantData($PlantData_object_array);
?>