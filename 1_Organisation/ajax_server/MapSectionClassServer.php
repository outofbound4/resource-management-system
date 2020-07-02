<?php
/*******************************************************************************
* Map Section Class 				                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/MappedClassSectionDataClass.php';

$session = new SessionManager();
$sql=$DB_CONN->get_insert_sql("map_class_section");
if($DB_CONN->query($sql) == true)
{
	echo "Mapped Successfully";
}
else 
	echo $DB_CONN->error();
?>