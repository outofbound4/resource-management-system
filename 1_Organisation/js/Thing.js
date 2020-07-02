/*******************************************************************************
* functions for user interface, transerfer the data to the server              *
*                                                                              *
*******************************************************************************/
function addThingInterface()
{
	var interface = "<div class='row'>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Thing Entry"+
	                            "</div>"+
	                            "<div class='panel-body'>"+
									"<form class='form-horizontal col-md-offset-1' id='add_thing'>"+
										"<div class='form-group col-md-11'>"+
											"<label for='nameClass'>Thing Name :</label>"+
											"<input type='text' class='form-control col-md-8' name='name' placeholder='Thing Name here'>"+
										"</div>"+
										"<div class='col-sm-offset-3 col-sm-8'>"+										
											"<button type='button' class='btn btn-success' onclick=\"addThingServer('add_thing');\" value='add' >Add</button>"+
											"&nbsp;"+
											"<button type='reset' class='btn btn-default' value='reset'>Reset</button>"+
										"</div>"+
									"</form>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary' id='panel'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Thing Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+
	                            	
	                            "</div>"+
							"</div>"+
						"</div>"+
					"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addThingInterface.php',POST_AJAX_view_table);
}

function deleteThingData(id)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_ThingData.php', POST_AJAX_view_table, 'idthings='+id);
	}
}

function addThingServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddThingServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function editThingData(idthings)
{
	window.open("editThingName.php?idthings="+idthings,"_self","");
}

function addThingsInRoomInterface()
{
	var interface ="<div class='row'>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Thing In Room Entry"+
		                            "</div>"+
		                            "<div class='panel-body'>"+
										"<form class='form-horizontal col-md-offset-1' id='add_to_room'>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Building_idbuilding'>Select Building :</label>"+
												"<div id='Building_idbuilding'>"+
													"<select class='form-control' name= 'Building_idbuilding'></select>"+
												"</div>"+
												
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Rooms_idRooms'>Select Room :</label>"+
												"<select class='form-control' id='Rooms_idRooms' name= 'Rooms_idRooms'>"+
													"<option value='0'>None</option>"+
												"</select>"+
												
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Things_idthings'>Select Thing :</label>"+
												"<select class='form-control' id='Things_idthings' name='Things_idthings'></select>"+
												
											"</div>"+
											"<div class='form-group col-md-11 text-center'>"+
												"<button type='button' class='btn btn-success' onclick=\"addThingsInRoomServer('add_to_room')\" value='add'>Add</button>"+
												"&nbsp"+
												"<button type='reset' class='btn btn-default' value='reset'>Reset</button>"+
											"</div>"+
										"</form>"+
									"</div>"+
								"</div>"+
							"</div>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary' id='panel'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Things in room Table"+
		                            "</div>"+
		                            "<div class='panel-body' id='view_table'>"+

		                            "</div>"+
								"</div>"+
							"</div>"+
						"</div>";
	
	document.getElementById("tab-content").innerHTML=interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addThingsInRoomInterface.php',POST_AJAX_addThingsInRoomInterface);
}

function POST_AJAX_addThingsInRoomInterface(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById("Building_idbuilding").innerHTML = res[0];
	document.getElementById("Things_idthings").innerHTML = res[1];
	document.getElementById("view_table").innerHTML = res[2];
}
function afterBuildingSelect_addThingsInRoomInterface()
{
	var ajax_object = new Ajax();
	var url = ajax_object.create_url_data('add_to_room');
	ajax_object.processPOST('ajax_server/AfterBuidingSelect_addThingsInRoomInterface.php',POST_AJAX_afterBuildingSelect_addThingsInRoomInterface, url);
}
function POST_AJAX_afterBuildingSelect_addThingsInRoomInterface(response_text)
{
	document.getElementById("Rooms_idRooms").innerHTML = response_text;
}

function addThingsInRoomServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddThingsInRoomServer.php", POST_AJAX_addThingsInRoomServer, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function POST_AJAX_addThingsInRoomServer(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById("Things_idthings").innerHTML = res[0];
	document.getElementById("view_table").innerHTML = res[1];
}


function deleteThingInRoom(idroom,idthing)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_ThingInRoom.php', POST_AJAX_deleteThingInRoom, 'Things_idthings='+idthing+'&Rooms_idRooms='+idroom);
	}
}

function POST_AJAX_deleteThingInRoom(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById("Things_idthings").innerHTML = res[0];
	document.getElementById("view_table").innerHTML = res[1];
}

function addThingsInBuildingInterface()
{
	var interface ="<div class='row'>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Things in Building Entry"+
		                            "</div>"+
		                            "<div class='panel-body'>"+
										"<form class='form-horizontal col-md-offset-1' id='add_to_building'>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Building_idbuilding'>Select Building :</label>"+
												"<select class='form-control' id='Building_idbuilding' name= 'Building_idbuilding'></select>"+
												
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Things_idthings'>Select Thing :</label>"+
												"<select class='form-control' id='Things_idthings' name='Things_idthings'></select>"+
												
											"</div>"+
											"<div class='form-group col-md-11 text-center'>"+
												"<button type='button' class='btn btn-success' onclick=\"addThingsInBuildingServer('add_to_building')\" value='add'>Add</button>"+
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
		                                "Email Table"+
		                            "</div>"+
		                            "<div class='panel-body' id='view_table' id='panel'>"+

		                            "</div>"+
								"</div>"+
							"</div>"+
						"</div>";
	
	document.getElementById("tab-content").innerHTML=interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addThingsInBuildingInterface.php',POST_AJAX_addThingsInBuildingInterface);
}

function POST_AJAX_addThingsInBuildingInterface(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById("Building_idbuilding").innerHTML = res[0];
	document.getElementById("Things_idthings").innerHTML = res[1];
	document.getElementById("view_table").innerHTML = res[2];
}

function addThingsInBuildingServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddThingsInBuildingServer.php", POST_AJAX_AddThingsInBuildingServer, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function POST_AJAX_AddThingsInBuildingServer(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById("Things_idthings").innerHTML = res[0];
	document.getElementById("view_table").innerHTML = res[1];
}

function deleteThingsInBuilding(idbuilding, idthing)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_ThingInBuilding.php', POST_AJAX_AddThingsInBuildingServer,
		 'Things_idthings='+idthing+'&Building_idbuilding='+idbuilding);
	}
}