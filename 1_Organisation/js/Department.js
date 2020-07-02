/*******************************************************************************
* functions for user interface, transerfer the data to the server              *
*                                                                              *
*******************************************************************************/
function addDepartmentInterface()
{
	var interface =	"<div class='row'>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Department Entry"+
	                            "</div>"+
	                            "<div class='panel-body'>"+
									"<form class='form-horizontal col-md-offset-1' id ='add_department'>"+
										"<div class='form-group col-md-11'>"+
											"<label for='Building_idbuilding'>Select Building :</label>"+
											"<select class='form-control' id='Building_idbuilding' name='Building_idbuilding'></select>"+
										"</div>"+
										"<div class='form-group col-md-11'>"+
											"<label for='departmentName'>Name :</label>"+
											"<input type='text' class='form-control' name='name' id='departmentName' placeholder='Department Name here'/>"+
										"</div>"+
										"<div class='form-group col-md-11 text-center'>"+
											"<button type='button' class='btn btn-success' onclick=\"addDepartmentServer('add_department');\" value ='add'>Add</button>"+
											"&nbsp;"+
											"<button type='reset' class='btn btn-default' value ='reset'>Reset</button>"+
										"</div>"+
									"</form>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Department Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+

	                            "</div>"+
							"</div>"+
						"</div>"+
					"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addDepartment.php',POST_AJAX_PageData_AddDepartment);
}

function addDepartmentServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddDepartmentServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function POST_AJAX_PageData_AddDepartment(response_text)
{
	var res = new Array();
	res = response_text.split(",");
	document.getElementById('Building_idbuilding').innerHTML=res[0];
	document.getElementById('view_table').innerHTML=res[1];
}

function deleteAddDepartment(iddepartment)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_deleteAddDepartment.php', POST_AJAX_view_table, 
			'iddepartment='+iddepartment);
	}
}

function editAddDepartment(iddepartment)
{
	window.open("editDepartmentName.php?iddepartment="+iddepartment,"_self","");
}

function mapDepartmentRoomInterface()
{
	var interface = "<div class='row'>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Mapping of Department Room Entry"+
	                            "</div>"+
	                            "<div class='panel-body'>"+
									"<form class='form-horizontal col-md-offset-1' id='add_room'>"+
										"<div class='form-group col-md-11'>"+
											"<label for='Department_iddepartment'>Select Department :</label>"+
											"<div id='Department_iddepartment'>"+
												"<select class='form-control' name='Department_iddepartment'></select>"+
											"</div>"+
										"</div>"+
										"<div class='form-group col-md-11'>"+
											"<label for='Rooms_idRooms'>Select Room :</label>"+
											"<div id='Rooms_idRooms1'>"+
												"<select class='form-control'>"+
													"<option>None</option>"+
												"</select>"+
											"</div>"+
										"</div>"+
										"<div class='form-group col-md-11 text-center'>"+
											"<button type='button' class='btn btn-success' onclick=\"MapDepartmentRoomServer('add_room');\" value='add' >Add</button>"+
											"&nbsp;"+
											"<button type='reset' class='btn btn-default' value='reset'>Reset</button>"+
										"</div>"+
									"</form>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Department Room Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+

	                            "</div>"+
							"</div>"+
						"</div>"+
					"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_MapDepartmentRoomServer.php',POST_AJAX_PageData_MapDepartmentRoomServer);
}

function POST_AJAX_PageData_MapDepartmentRoomServer(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById('Department_iddepartment').innerHTML=res[0];
	document.getElementById('view_table').innerHTML=res[1];
}

function MapDepartmentRoomServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/MapDepartmentRoomServer.php", POST_AJAX_MapDepartmentRoomServer, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function POST_AJAX_MapDepartmentRoomServer(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById('Rooms_idRooms').innerHTML=res[0];
	document.getElementById('view_table').innerHTML=res[1];
}

function deleteMappedDepartmentRoomData(iddepartment,idroom)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_MappedDepartmentRoom.php', POST_AJAX_view_table, 
			'Department_iddepartment='+iddepartment+'&Rooms_idRooms='+idroom);
	}
}

function afterDepartmentSelect_mapDepartmentRoomInterface()
{
	var ajax_object = new Ajax();
	var url = ajax_object.create_url_data('add_room');
	ajax_object.processPOST('ajax_server/AfterDepartmentSelect_mapDepartmentRoomInterface.php', POST_AJAX_afterDepartmentSelect_mapDepartmentRoomInterface, url);
}
function POST_AJAX_afterDepartmentSelect_mapDepartmentRoomInterface(response_text)
{
	document.getElementById('Rooms_idRooms1').innerHTML=response_text;
}
function addDepartmentPhoneInterface()
{
	var interface =	"<div class='row'>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Department Phone Entry"+
	                            "</div>"+
	                            "<div class='panel-body'>"+
									"<!--form -->"+
									"<form class='form-horizontal col-md-offset-1' id ='phoneno'>"+
										"<div class='form-group col-md-11'>"+
											"<label for='Department_iddepartment'>Select Department :</label>"+
											"<div class='' id='Department_iddepartment'>"+
												"<select class='form-control' name='Department_iddepartment'>"+
													"<option>None</option>"+
												"</select>"+
											"</div>"+
										"</div>"+
										"<div class='form-group col-md-11'>"+
											"<label for='phone'>Phone No. :</label>"+
											"<input type='text' class='form-control col-md-8' name='phone' id='phone' placeholder='+911232111111'>"+
										"</div>"+
										
										"<div class='form-group col-md-11 text-center'>"+
											"<button type='button' class='btn btn-success' onclick=\"AddDepartmentPhoneServer('phoneno');\" value ='add'>Add</button>"+
											"&nbsp;"+
											"<button type='reset' class='btn btn-default' value ='reset'>Reset</button>"+
										"</div>"+
									"</form>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Department Phone Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+

	                            "</div>"+
							"</div>"+
						"</div>"+
					"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addDepartmentPhoneInterface.php',POST_AJAX_addDepartmentPhoneInterface);
}

function AddDepartmentPhoneServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddDepartmentPhoneServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function POST_AJAX_addDepartmentPhoneInterface(response_text)
{
	var res = new Array();
	res = response_text.split(",");
	document.getElementById('Department_iddepartment').innerHTML=res[0];
	document.getElementById('view_table').innerHTML=res[1];
}

function deleteDepartmentPhone(departmentPhone)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_DepartmentPhone.php', POST_AJAX_view_table, 
			'phone='+departmentPhone);
	}
}