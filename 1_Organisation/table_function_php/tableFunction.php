<?php

function HTML_table($data_array, $onDeleteClick='', $OnClickfunction='')
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	$class_vars = get_object_vars($data_array[0]);
	echo "<th></th>";
	foreach ($class_vars as $name => $value) 
	{
		echo "<th>" . $name . "</th>";
	}
	echo "<th>EDIT</th>";
	echo "</tr>";
	$rci =0;
	foreach ($data_array as $row)
	{
		if($rci == $rcl) $rci = 0;
		$class_vars = get_object_vars($row);
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' onclick = '$onDeleteClick(".$row->ID.")'>DELETE</button></th>";
		foreach ($class_vars as $name => $value)
		{
			echo "<th>$value</th>";
		}
		echo "<th><button type='button' class='btn btn-primary' onclick = '$OnClickfunction(".$row->ID.")'>Edit</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}

function HTML_select($data_array,$name,$id, $func='')
{
	echo "<select class='form-control' id='$id' name='$name' onchange=$func>";
	echo "<option value=''>None</option>";
	foreach ($data_array as $row)
	{
		echo "<option value='".$row->ID."'>".$row->NAME."</option>";
	}
	echo "</select>";
}

function HTML_Mapped_Table($mapped_object_array, $onDeleteClick='')
{
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci = 0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($mapped_object_array as $mapped_object)
	{
		$ID = array();
		if($rci == $rcl) $rci = 0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		foreach ($mapped_object as $object => $value)
		{
			echo "<td>".$value->NAME."</td>";
			$ID[] = $value->ID;
		}
			echo "<td><button type='button' class='btn btn-danger' onclick=\"$onDeleteClick('".$ID[0]."','".$ID[1]."')\">Delete</button>";
		echo "</tr>";
	}
	echo "</table>";
}

function HTML_table_ThingRepair($ThingMaintananceData_object_array)
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($ThingMaintananceData_object_array as $ThingMaintananceData_object)
	{
		if($rcl==$rci)$rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th>".$ThingMaintananceData_object->ThingData_object->NAME."</th>";
		echo "<th>".$ThingMaintananceData_object->NAME."</th>";
		echo "<th>$ThingMaintananceData_object->COST</th>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' 
		onclick = \"deleteThingMaintananceData('".$ThingMaintananceData_object->ID."')\">DELETE</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}

function ThingInRoom_Table($mapped_object_array)
{
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci = 0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($mapped_object_array as $mapped_object)
	{
		if($rci == $rcl) $rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<td>".$mapped_object->RoomData_object->BuildingData_object->NAME."</td>";
		echo "<td>".$mapped_object->RoomData_object->NAME."</td>";
		echo "<td>".$mapped_object->ThingData_object->NAME."</td>";
		echo "<td><button type='button' class='btn btn-danger' onclick=\"deleteThingInRoom('".$mapped_object->RoomData_object->ID."','".$mapped_object->ThingData_object->ID."')\">Delete</button>";
		echo "</tr>";
	}
	echo "</table>";
}

function HTML_table_BuildingMaintanance($BuildingMaintananceData_object_array)
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($BuildingMaintananceData_object_array as $BuildingMaintananceData_object)
	{
		if($rcl==$rci)$rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th>".$BuildingMaintananceData_object->BuildingData_object->NAME."</th>";
		echo "<th>".$BuildingMaintananceData_object->NAME."</th>";
		echo "<th>$BuildingMaintananceData_object->COST</th>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' 
		onclick = \"deleteBuildingMaintananceData('".$BuildingMaintananceData_object->ID."')\">DELETE</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}

function HTML_table_GurdenData($GuardenData_object_array)
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($GuardenData_object_array as $GuardenData_object)
	{
		if($rcl==$rci)$rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' onclick = \"deleteGurdenData('".$GuardenData_object->ID."')\">DELETE</button></th>";
		echo "<th>$GuardenData_object->ID</th>";
		echo "<th>".$GuardenData_object->BuildingData_object->NAME."</th>";
		echo "<th>$GuardenData_object->NAME</th>";
		echo "<th><button type='button' class='btn btn-primary' onclick =\"editGuardenData('".$GuardenData_object->ID."')\">EDIT</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}

function HTML_table_PlantData($PlantData_object_array)
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($PlantData_object_array as $PlantData_object)
	{
		if($rcl==$rci)$rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th>".$PlantData_object->GaurdenData_object->BuildingData_object->NAME."</th>";
		echo "<th>".$PlantData_object->GaurdenData_object->NAME."</th>";
		echo "<th>$PlantData_object->NAME</th>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' 
		onclick = \"deletePlantData('".$PlantData_object->ID."')\">DELETE</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}

function HTML_table_addDepartment($DepartmentData_object_array)
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($DepartmentData_object_array as $DepartmentData_object)
	{
		if($rcl==$rci)$rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' onclick = 'deleteAddDepartment(".$DepartmentData_object->ID.")'>DELETE</button></th>";
		echo "<th>$DepartmentData_object->ID</th>";
		echo "<th>$DepartmentData_object->NAME</th>";
		echo "<th>".$DepartmentData_object->BUILDING->NAME."</th>";
		echo "<th><button type='button' class='btn btn-primary' onclick = 'editAddDepartment(".$DepartmentData_object->ID.")'>EDIT</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}

function HTML_table_DepartmentPhone($DepartmentPhoneData_object_array)
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($DepartmentPhoneData_object_array as $DepartmentPhoneData_object)
	{
		if($rcl==$rci)$rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' onclick = \"deleteDepartmentPhone('".$DepartmentPhoneData_object->PHONE."')\">DELETE</button></th>";
		echo "<th>$DepartmentPhoneData_object->PHONE</th>";
		echo "<th>".$DepartmentPhoneData_object->DEPARTMENT_OBJECT->NAME."</th>";
		echo "<th><button type='button' class='btn btn-primary' onclick = \"editDepartmentPhone('".$DepartmentPhoneData_object->PHONE."')\">EDIT</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}


function HTML_MappedClassRoomInterface_Table($mapped_object_array)
{
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($mapped_object_array as $mapped_object)
	{
		if($rcl == $rci) $rci = 0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<td>".$mapped_object->RoomData_object->BuildingData_object->NAME."</td>";
		echo "<td>".$mapped_object->RoomData_object->NAME."</td>";
		echo "<td>".$mapped_object->MappedClassSectionData_object->ClassData_object->NAME."</td>";
		echo "<td>".$mapped_object->MappedClassSectionData_object->SectionData_object->NAME."</td>";
		echo "<td><button type='button' class='btn btn-danger' onclick=\"delete_MappedRoomClass('".$mapped_object->RoomData_object->ID."','".$mapped_object->MappedClassSectionData_object->ID."')\">Delete</button>";
		echo "</tr>";
	}
	echo "</table>";
}

function HTML_table_AddRoomData($RoomData_object_array)
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($RoomData_object_array as $RoomData_object)
	{
		if($rcl==$rci)$rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' onclick = \"deleteRoomData('".$RoomData_object->ID."')\">DELETE</button></th>";
		echo "<th>$RoomData_object->ID</th>";
		echo "<th>".$RoomData_object->BuildingData_object->NAME."</th>";
		echo "<th>".$RoomData_object->NAME."</th>";
		echo "<th><button type='button' class='btn btn-primary' onclick = \"editRoomData('".$RoomData_object->ID."')\">EDIT</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}

function HTML_table_OrganisationPhone($OrganisationPhoneData_object_array)
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($OrganisationPhoneData_object_array as $OrganisationPhoneData_object)
	{
		if($rcl==$rci)$rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th>".$OrganisationPhoneData_object->Phone_No."</th>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' onclick = \"deleteOrganisationPhone('".$OrganisationPhoneData_object->Phone_No."')\">DELETE</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}

function HTML_table_OrganisationEmail($OrganisationEmailData_object_array)
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($OrganisationEmailData_object_array as $OrganisationEmailData_object)
	{
		if($rcl==$rci)$rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th>".$OrganisationEmailData_object->Email_ID."</th>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' onclick = \"deleteOrganisationEmail('".$OrganisationEmailData_object->Email_ID."')\">DELETE</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}

function RoomCapacityData_Table($RoomCapacityData_object_array)
{	
	$row_class = array("success", "info", "warning", "danger");
	$rcl = count($row_class);
	$rci=0;
	echo "<table id='bootstrap-data-table' class='table table-striped table-bordered table-hover'><tr>";
	foreach ($RoomCapacityData_object_array as $RoomCapacityData_object)
	{
		if($rcl==$rci)$rci=0;
		echo "<tr class = '".$row_class[$rci++]."'>";
		echo "<th>".$RoomCapacityData_object->RoomData_object->BuildingData_object->NAME."</th>";
		echo "<th>".$RoomCapacityData_object->RoomData_object->NAME."</th>";
		echo "<th>".$RoomCapacityData_object->CAPACITY."</th>";
		echo "<th>".$RoomCapacityData_object->ALLOTMENT."</th>";
		echo "<th><button type='button' class='btn btn-primary btn-danger' onclick = \"deleteRoomCapacity('".$RoomCapacityData_object->RoomData_object->ID."')\">DELETE</button></th>";
		echo "</tr>";
	}
	echo "</table>";
}

?>