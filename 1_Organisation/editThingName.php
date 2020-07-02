<?php
require_once 'top_nav.php';

require_once('../config/FolderPath.php');
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/classes/ThingDataClass.php';

$formData 	= new Forms();
$data 		= $formData->getFormData();

$idthings = $data['idthings'];
$ThingData_object = ThingData::getThingData($idthings);
?>
<script type="text/javascript">
	function updateThingName(form_id)
	{
		var ajax_object = new Ajax();
		var url = ajax_object.create_url_data(form_id);
		ajax_object.processPOST('ajax_editServer/editThingNameServer.php',
								POST_AJAX_editThingNameServer, url);
	}

	function POST_AJAX_editThingNameServer(response_text)
	{
		if(response_text=='1')
		{
			alert("Updated successfully...");
			window.open("Thing.php","_self");
		}
		else
			alert("update failed...");
	}

	function CloseWindow()
	{
		window.open("Thing.php","_self");
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
		         Thing Name Update
		        </div>
		        <div class='panel-body'>
					<form class='form-horizontal col-md-offset-1' id='thing'>
						<div class='form-group col-md-11'>
							<label for='ThingName'>Name :</label>
							<input type='text' class='form-control col-md-8' id='ThingName' name='name' onchange="EmptyCheck('ThingName','<?php echo $ThingData_object->NAME; ?>')" value=" <?php echo $ThingData_object->NAME; ?>" placeholder='Class Name here'>
						</div>
						<div class='col-sm-offset-3 col-sm-8'>										
							<button type='button' class='btn btn-success' onclick="updateThingName('thing');" value='add' >Update</button>
							&nbsp;
							<button type='button' class='btn btn-default' onclick = "CloseWindow()" value='close'>Cancle</button>
						</div>
						<input type='hidden' name='idthings' value ="<?php echo $idthings; ?>"/>
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
