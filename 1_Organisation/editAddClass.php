<?php
require_once 'top_nav.php';

require_once('../config/FolderPath.php');
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/classes/ClassDataClass.php';

$formData = new Forms();
$data = $formData->getFormData();
$class_id = $data['class_id'];
$ClassData_object = ClassData::getClassData($class_id);
?>
<script type="text/javascript">
	function updateClassName(form_id)
	{
		var ajax_object = new Ajax();
		var url = ajax_object.create_url_data(form_id);
		ajax_object.processPOST('ajax_editServer/editClassNameServer.php',
								POST_AJAX_editClassName, url);
	}

	function POST_AJAX_editClassName(response_text)
	{
		if(response_text=='1')
		{
			alert("Updated successfully...");
			window.open("Class.php","_self");
		}
		else
			alert("update failed...");
	}

	function CloseWindow()
	{
		window.open("Class.php","_self");
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
			<div><br/></div>
			<div class='panel panel-primary'>
		        <div class='panel-heading text-center'>
		         Class Update
		        </div>
		        <div class='panel-body'>
					<form class='form-horizontal col-md-offset-1' id='add_class'>
						<div class='form-group col-md-11'>
							<label for='nameClass'>Name :</label>
							<input type='text' class='form-control col-md-8' id='className' name='name' onchange="EmptyCheck('className','<?php echo $ClassData_object->NAME; ?>')" value=" <?php echo $ClassData_object->NAME; ?>" placeholder='Class Name here'>
						</div>
						<div class='col-sm-offset-3 col-sm-8'>										
							<button type='button' class='btn btn-success' onclick="updateClassName('add_class');" value='add' >Update</button>
							&nbsp;
							<button type='button' class='btn btn-default' onclick = "CloseWindow()" value='reset'>Cancle</button>
						</div>
						<input type='hidden' name='class_id' value ="<?php echo $class_id; ?>"/>
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
