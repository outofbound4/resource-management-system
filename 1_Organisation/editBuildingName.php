<?php
require_once 'top_nav.php';

require_once('../config/FolderPath.php');
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';

$session 				= new SessionManager();
$formData 				= new Forms();
$data 					= $formData->getFormData();;
$idbuilding 			= $data['idbuilding'];
$BuildingData_object 	= BuildingData::getBuildingData($idbuilding);
?>
<script src="organisation_structure.js"></script>
<script src="test_js.js"></script>
<script type="text/javascript">
	function updateBuildingName(form_id)
	{
		var ajax_object = new Ajax();
		var url = ajax_object.create_url_data(form_id);
		ajax_object.processPOST('ajax_editServer/editBuildingNameServer.php',
								POST_AJAX_editBuildingNameServer, url);
	}

	function POST_AJAX_editBuildingNameServer(response_text)
	{
		if(response_text=='1')
		{
			alert("Updated successfully...");
			window.open("Organisation_structure.php?tabNo=2","_self");
		}
		else
			alert("update failed...");
	}

	function CloseWindow()
	{
		window.open("Organisation_structure.php?tabNo=2","_self");
	}
	
	function EmptyCheck(id,value)
	{
		if(document.getElementById(id).value=='')
			document.getElementById(id).value=value;
	}
</script>
<div class='container-fluid'>
	<div class='row col-md-offset-3'>
		<div class='col-md-6'>
			<div><br/><br/></div>
			<div class='panel panel-primary'>
		        <div class='panel-heading text-center'>
		         Building Name Update
		        </div>
		        <div class='panel-body'>
					<form class='form-horizontal col-md-offset-1' id='building'>
						<div class='form-group col-md-11'>
							<label for='BuildingName'>Name :</label>
							<input type='text' class='form-control col-md-8' id='BuildingName' name='name' onchange="EmptyCheck('sectionName','<?php echo $BuildingData_object->NAME; ?>')" value=" <?php echo $BuildingData_object->NAME; ?>" placeholder='Building Name here'>
						</div>
						<div class='col-sm-offset-3 col-sm-8'>
							<button type='button' class='btn btn-success' onclick="updateBuildingName('building');" value='add' >Update</button>
							&nbsp;
							<button type='button' class='btn btn-default' onclick = "CloseWindow()" value='reset'>Cancle</button>
						</div>
						<input type='hidden' name='idbuilding' value ="<?php echo $idbuilding; ?>"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../lib_js/ajax.js"></script>
<?php
require_once 'footer.php';
?>
