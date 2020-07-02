<?php
/*******************************************************************************
* page data section interface		                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/SectionDataClass.php';

$session = new SessionManager();
$SectionData_object_array = SectionData::getAllSectionData();
HTML_table($SectionData_object_array,'deleteSectionData','editSectionData');

?>