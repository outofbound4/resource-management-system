
<?php
/*******************************************************************************
* Load SectionClassCheckBox In MapSectionClass.php                             *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/classes/SectionDataClass.php';
require_once root . '1_Organisation/classes/MappedClassSectionDataClass.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$idclass = $data['Class_idClass'];

$SectionData_object_array = SectionData::getAllSectionData();
$MappedClassSectionData_object_array = MappedClassSectionData::getMappedSections_Of_Class($idclass);


echo "<table id='table1' class='table table-striped table-bordered table-hover'>";
$row_class = array("success", "info", "warning", "danger");
$rcl = count($row_class);
$rci =0;
foreach($SectionData_object_array as $SectionData_object)
{
	if($rcl==$rci)$rci=0;
	$status = search($MappedClassSectionData_object_array, $SectionData_object->ID);
	if($status == 1)
		echo "<tr class = '".$row_class[$rci++]."'>
				<td>$SectionData_object->NAME</td>
				<td><input type='checkbox' class='form-control'  
						onclick='onClickSectionCheckbox_inMapSectionClass(\"$SectionData_object->ID\", \"gui\");' checked />
				</td>
			</tr>";
	else
		echo "<tr class = '".$row_class[$rci++]."'>
				<td>$SectionData_object->NAME</td>
				<td><input type='checkbox' class='form-control'
						onclick='onClickSectionCheckbox_inMapSectionClass(\"$SectionData_object->ID\", \"gui\");' />
				</td>
			</tr>";
}
echo "</table>";

////////////////////////////////////////////
function search($MappedClassSectionData_object_array, $Section_id)
{
	foreach($MappedClassSectionData_object_array as $MappedClassSectionData_object)
	{
		if($MappedClassSectionData_object->SectionData_object->ID == $Section_id) return 1;
	}
	return 0;
}

?>