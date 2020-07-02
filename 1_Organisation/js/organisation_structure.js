/*******************************************************************************
* functions for user interface, transerfer the data to the server              *
*                                                                              *
*******************************************************************************/

function addOrganisationInterface()
{
	var interface =	"<div class='row' id='row'>"+
						"<div class='col-md-6' id='col1'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary' id='panel'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Organisation Entry"+
	                            "</div>"+
	                            "<div class='panel-body'>"+
									"<form class='form-horizontal col-md-offset-1' id='gui'>"+
										"<div class='form-group col-md-11'>"+
											"<label for='nameOrg'>Name :</label>"+
											"<input type='text' class='form-control col-md-8' id='nameOrg' placeholder='Org Name here' name='name'>"+
										"</div>"+
										"<div class='form-group col-md-11'>"+
											"<label for='address'>Address :</label>"+
											"<input type='text' class='form-control' id='address' placeholder='Enter Address here' name='address'>"+
										"</div>"+
										"<div class='form-group col-md-11'>"+
											"<label for='land'>Land :</label>"+
											"<input type='number' class='form-control' id='land' placeholder='Enter Land here' name='land'>"+
										"</div>"+
										"<div class='form-group text-center col-md-11'>"+
											"<button type='button' class='btn btn-success' onclick=\"addOrganisationServer('gui');\" value='add'>Add</button>"+
											"&nbsp"+
											"<button type='reset' class='btn btn-default' value='reset'>Reset</button>"+
										"</div>"+
									"</form>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div class='col-md-6' id='col1'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Organisation Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+

	                            "</div>"+
							"</div>"+
						"</div>"+
					"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addOrganisationInterface.php',POST_AJAX_PageData_addOrganisationInterface);
}

function POST_AJAX_PageData_addOrganisationInterface(response_text)
{
	document.getElementById('view_table').innerHTML=response_text;
}

function addOrganisationServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddOrganisationServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function organisationDataDelete(idorganisation)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_OrganisationData.php', POST_AJAX_view_table, 'idorganisation='+idorganisation);
	}	
}

function organisationDataEdit(idorganisation)
{
	window.open("editOrganisationData.php?idorganisation="+idorganisation,"_self","");
}

function addBuildingInterface()
{
	var interface =	"<div class='row'>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Building Entry"+
	                            "</div>"+
	                            "<div class='panel-body'>"+
									"<form class='form-horizontal col-md-offset-1' id ='add_building'>"+
										"<div class='form-group col-md-11'>"+
											"<label for='nameBuilding'>Name :</label>"+
											"<input type='text' class='form-control col-md-8' name='name' id='nameBuilding' placeholder='Building Name here'>"+
										"</div>"+
										
										"<div class='form-group col-md-11 text-center'>"+
											"<button type='button' class='btn btn-success' onclick=\"addBuildingServer('add_building');\" value ='add'>Add</button>"+
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
	                                "Building Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+

	                            "</div>"+
							"</div>"+
						"</div>"+
					"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addBuildingInterface.php', POST_AJAX_view_table);
}

function addBuildingServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddBuildingServer.php", POST_AJAX_view_table ,url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function deleteBuilding(idbuilding)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_BuildingData.php', POST_AJAX_view_table, 'idbuilding='+idbuilding);
	}	
}

function editBuilding(idbuilding)
{
	window.open("editBuildingName.php?idbuilding="+idbuilding,"_self","");
}

function addRoomInterface()
{
	var interface = "<div class='row'>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Room Entry"+
	                            "</div>"+
			                    "<div class='panel-body'>"+
									"<form class='form-horizontal col-md-offset-1' id='add_room'>"+
										"<div class='form-group col-md-11'>"+
											"<label for='Building_idbuilding'>Select Building :</label>"+
											"<select class='form-control' id='Building_idbuilding' name='Building_idbuilding'></select>"+
										"</div>"+
										"<div class='form-group col-md-11'>"+
											"<label for='nameRoom'>Room Name :</label>"+
											"<input type='text' class='form-control' name='name' id='nameRoom' placeholder='Room Name here'>"+
										"</div>"+
										"<div class='form-group col-md-11 text-center'>"+
											"<button type='button' class='btn btn-success' onclick=\"addRoomServer('add_room');\" value='add' >Add</button>"+
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
	                                "Room Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+

	                            "</div>"+
							"</div>"+
						"</div>"+
					"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addRoomInterface.php', POST_AJAX_PageData_addRoomInterface);
}

function addRoomServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddRoomServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function POST_AJAX_PageData_addRoomInterface(response_text)
{
	var res = new Array();
	res = response_text.split(',');
	document.getElementById('Building_idbuilding').innerHTML=res[0];
	document.getElementById('view_table').innerHTML=res[1];
}

function deleteRoomData(idroom)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_RoomData.php', POST_AJAX_view_table, 'idRooms='+idroom);
	}
}

function editRoomData(idRooms)
{
	window.open("editRoomName.php?idRooms="+idRooms,"_self","");
}

function addRoomCapacityInterface()
{
	var interface ="<div class='row'>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Add Room Capacity"+
		                            "</div>"+
		                            "<div class='panel-body'>"+
										"<form class='form-horizontal col-md-offset-1' id='add_to_room'>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Building_idbuilding'>Select Building :</label>"+
												"<div id='Building_idbuilding1'>"+
													"<select class='form-control' name= 'Building_idbuilding'></select>"+
												"</div>"+
												
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Rooms_idRooms'>Select Room :</label>"+
												"<div id='Rooms_idRooms1'>"+
													"<select class='form-control'>"+
														"<option value='0'>None</option>"+
													"</select>"+
												"</div>"+
												
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='capacity'>Capacity :</label>"+
												"<input type='number' class='form-control' name='capacity' id ='capacity'  placeholder='Capacity'/>"+
											"</div>"+
											"<div class='form-group col-md-11 text-center'>"+
												"<button type='button' class='btn btn-success' onclick=\"addRoomCapacityServer('add_to_room')\" value='add'>Add</button>"+
												"&nbsp"+
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
		                                "Room Capacity"+
		                            "</div>"+
		                            "<div class='panel-body' id='view_table'>"+

		                            "</div>"+
								"</div>"+
							"</div>"+
						"</div>";
	
	document.getElementById("tab-content").innerHTML=interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addRoomCapacityInterface.php',POST_AJAX_addRoomCapacityInterface);
}

function POST_AJAX_addRoomCapacityInterface(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById("Building_idbuilding1").innerHTML = res[0];
	document.getElementById("view_table").innerHTML = res[1];
}

function afterBuildingSelect_addRoomCapacityInterface()
{
	var Building_idbuilding = document.getElementById('Building_idbuilding').value;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/AfterBuidingSelect_addRoomCapacityInterface.php',
		POST_AJAX_afterBuildingSelect_addRoomCapacityInterface, 'Building_idbuilding='+Building_idbuilding);
}
function POST_AJAX_afterBuildingSelect_addRoomCapacityInterface(response_text)
{
	document.getElementById('Rooms_idRooms1').innerHTML = response_text;
}

function addRoomCapacityServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddRoomCapacityServer.php", POST_AJAX_addRoomCapacityServer, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function deleteRoomCapacity(Rooms_idRooms)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_RoomCapacity.php', POST_AJAX_addRoomCapacityInterface, 'Rooms_idRooms='+Rooms_idRooms);
	}
}

function POST_AJAX_addRoomCapacityServer(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById("Rooms_idRooms1").innerHTML = res[0];
	document.getElementById("view_table").innerHTML = res[1];
}

function addOrganisationPhoneInterface()
{
	var interface =	"<div class='row'>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Phone Entry"+
	                            "</div>"+
	                            "<div class='panel-body'>"+
									"<!--form -->"+
									"<form class='form-horizontal col-md-offset-1' id ='phoneno'>"+
										"<div class='form-group col-md-11'>"+
											"<label for='phone'>Phone No. :</label>"+
											"<input type='text' class='form-control col-md-8' name='phone' id='phone' placeholder='+911232111111'>"+
										"</div>"+
										
										"<div class='form-group col-md-11 text-center'>"+
											"<button type='button' class='btn btn-success' onclick=\"addOrganisationPhoneServer('phoneno');\" value ='add'>Add</button>"+
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
	                                "Phone Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+

	                            "</div>"+
							"</div>"+
						"</div>"+
					"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addOrganisationPhoneInterface.php', POST_AJAX_view_table);
}

function addOrganisationPhoneServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddOrganisationPhoneServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function deleteOrganisationPhone(phone)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_OrganisationPhoneData.php', POST_AJAX_view_table, 'phone='+phone);
	}
}
function addOrganisationEmailInterface()
{
	var interface =	"<div class='row'>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Email Entry"+
	                            "</div>"+
	                            "<div class='panel-body'>"+
									"<!--form -->"+
									"<form class='form-horizontal col-md-offset-1' id ='email'>"+
										"<div class='form-group col-md-11'>"+
											"<label for='emailId'>Email ID :</label>"+
											"<input type='text' class='form-control col-md-8' name='emailId' id='emailId' placeholder='Exa :- gaurav@gmail.com'>"+
										"</div>"+
										
										"<div class='form-group col-md-11 text-center'>"+
											"<button type='button' class='btn btn-success' onclick=\"addOrganisationEmailServer('email','emailId');\" value ='add'>Add</button>"+
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
	                                "Email Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+

	                            "</div>"+
							"</div>"+
						"</div>"+
					"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addOrganisationEmailInterface.php', POST_AJAX_view_table);
}

function addOrganisationEmailServer(form_id,emailid)
{
	if(!Empty_check(form_id))
	{
		if(ValidateEmail(emailid))
		{
			var ajax_obj = new Ajax();
			var url = ajax_obj.create_url_data(form_id);
			ajax_obj.processPOST("ajax_server/AddOrganisationEmailServer.php", POST_AJAX_view_table, url);
		}
		else
			alert("You have entered an invalid email address!");
	}
	else
		alert("Empty Field Not Allowed...");
}

function deleteOrganisationEmail(email)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_OrganisationEmailData.php', POST_AJAX_view_table, 'emailId='+email);
	}
}