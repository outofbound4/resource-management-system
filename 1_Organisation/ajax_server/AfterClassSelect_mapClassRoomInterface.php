<?php
/*******************************************************************************
* after class select in mapclassRoomInterface.php                              *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/SectionDataClass.php';
require_once root . '1_Organisation/classes/MappedClassSectionDataClass.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$idClass = $data['class_id'];

$MappedClassSectionData_object_array = MappedClassSectionData::getAllMappedClassSectionData();
$SectionData_object_array = SectionData::getAllSectionData();
$UnmappedSection_of_class_object_array = UnmappedSection_of_class::getUnmappedSection_of_class($MappedClassSectionData_object_array, $SectionData_object_array, $idClass);

HTML_select($UnmappedSection_of_class_object_array,'Section_id','Section_id');


/************************************class****************************************************************/
class UnmappedSection_of_class
{
	var $ID;
	var $NAME;

	public function __construct($id, $name)
	{
		$this->ID 	= $id;
		$this->NAME  = $name;
	}

	public static function getUnmappedSection_of_class($MappedClassSectionData_object_array, $SectionData_object_array, $idclass)
	{
		$data_array = array();
		foreach ($SectionData_object_array as $SectionData_object)
		{
			$status = self::search($MappedClassSectionData_object_array, $SectionData_object->ID, $idclass);
			if($status == 1)
				$data_array[] = new UnmappedSection_of_class($SectionData_object->ID, $SectionData_object->NAME);
		}
		return $data_array;
	}

	function search($MappedClassSectionData_object_array, $idsection, $idclass)
	{
		foreach ($MappedClassSectionData_object_array as $MappedClassSectionData_object)
		{
			if($MappedClassSectionData_object->ClassData_object->ID == $idclass && $idsection == $MappedClassSectionData_object->SectionData_object->ID)
			{
				return 1;
			}
		}
		return 0;
	}
}

?>