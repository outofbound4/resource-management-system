<?php
require_once 'top_nav.php';

require_once('../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/classes/OrganisationDataClass.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();

$idorganisation = $data['idorganisation'];
$OrganisationData_object = OrganisationData::getOrganisationData($idorganisation);
//exit(print_r($OrganisationData_object));
?>
<script type="text/javascript">
	function updateOrganisationData(form_id)
	{
		var ajax_object = new Ajax();
		var url = ajax_object.create_url_data(form_id);
		ajax_object.processPOST('ajax_editServer/editOrganisationDataServer.php',
								POST_AJAX_editOrganisationDataServer, url);
	}

	function POST_AJAX_editOrganisationDataServer(response_text)
	{
		if(response_text=='1')
		{
			alert("Updated successfully...");
			window.open("Organisation_structure.php","_self");
			addSectionInterface();
		}
		else
			alert("update failed...");
	}

	function CloseWindow()
	{
		window.open("organisation_structure.php","_self");
		addSectionInterface();
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
		         Organisation Data Update
		        </div>
		        <div class='panel-body'>
					<form class='form-horizontal col-md-offset-1' id='gui'>
						<div class='form-group col-md-11'>
							<label for='nameOrg'>Name :</label>
							<input type='text' class='form-control col-md-8' id='nameOrg' placeholder='Org Name here' name='name' onchange="EmptyCheck('nameOrg','<?php echo $OrganisationData_object->NAME; ?>')" value = "<?php echo $OrganisationData_object->NAME; ?>">
						</div>
						<div class='form-group col-md-11'>
							<label for='address'>Address :</label>
							<input type='text' class='form-control' id='address' placeholder='Enter Address here' name='address' onchange="EmptyCheck('address','<?php echo $OrganisationData_object->ADDRESS; ?>')" value = '<?php echo $OrganisationData_object->ADDRESS; ?>'>
						</div>
						<div class='form-group col-md-11'>
							<label for='land'>Land :</label>
							<input type='number' class='form-control' id='land' placeholder='Enter Land here' name='land' onchange="EmptyCheck('land','<?php echo $OrganisationData_object->LAND; ?>')" value='<?php echo $OrganisationData_object->LAND; ?>'>
						</div>
						<div class='form-group text-center col-md-11'>
							<button type='button' class='btn btn-success' onclick="updateOrganisationData('gui');" value='add'>Update</button>
							&nbsp
							<button type='button' class='btn btn-default' onclick="CloseWindow()" value='reset'>Cancle</button>
						</div>
						<input type='hidden' name='idorganisation' value ="<?php echo $idorganisation; ?>"/>
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
