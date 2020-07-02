<?php
require_once 'top_nav.php';

require_once('../config/FolderPath.php');
require_once root . '1_Organisation/classes/SectionDataClass.php';
require_once root.'1_Organisation/package/forms.php';

$formData = new Forms();
$data = $formData->getFormData();
$Section_id = $data['Section_id'];
$SectionData_object = SectionData::getSectionData($Section_id);
?>
<script type="text/javascript">
	function updateSectionName(form_id)
	{
		var ajax_object = new Ajax();
		var url = ajax_object.create_url_data(form_id);
		ajax_object.processPOST('ajax_editServer/editSectionNameServer.php',
								POST_AJAX_editSectionNameServer, url);
	}

	function POST_AJAX_editSectionNameServer(response_text)
	{
		if(response_text=='1')
		{
			alert("Updated successfully...");
			window.open("Class.php?tabNo=2","_self");
			addSectionInterface();
		}
		else
			alert("update failed...");
	}

	function CloseWindow()
	{
		window.open("Class.php?tabNo=2","_self");
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
		         Section Update
		        </div>
		        <div class='panel-body'>
					<form class='form-horizontal col-md-offset-1' id='add_class'>
						<div class='form-group col-md-11'>
							<label for='nameClass'>Name :</label>
							<input type='text' class='form-control col-md-8' id='sectionName' name='name' onchange="EmptyCheck('sectionName','<?php echo $SectionData_object->NAME; ?>')" value=" <?php echo $SectionData_object->NAME; ?>" placeholder='Class Name here'>
						</div>
						<div class='col-sm-offset-3 col-sm-8'>										
							<button type='button' class='btn btn-success' onclick="updateSectionName('add_class');" value='add' >Update</button>
							&nbsp;
							<button type='button' class='btn btn-default' onclick = "CloseWindow()" value='reset'>Cancle</button>
						</div>
						<input type='hidden' name='Section_id' value ="<?php echo $Section_id; ?>"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../lib_js/ajax.js"></script>
<script src="js/class.js"></script>
<?php
require_once 'footer.php';
?>
