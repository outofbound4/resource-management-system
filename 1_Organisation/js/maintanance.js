/*******************************************************************************
* functions for user interface, transerfer the data to the server              *
*                                                                              *
*******************************************************************************/
function buildingMaintananceInterface()
{
	var interface ="<div class='row'>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Building Maintanance Entry"+
		                            "</div>"+
		                            "<div class='panel-body'>"+
										"<form class='form-horizontal col-md-offset-1' id='Building_maintanance'>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Building_idbuilding'>Select Building :</label>"+
												"<select class='form-control' id='Building_idbuilding' name= 'Building_idbuilding'></select>"+
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='name'>Maintanance Name :</label>"+
												"<input type='text' class='form-control' id='name' name='name' placeholder='maintainance Name here'>"+
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='cost'>Cost :</label>"+
												"<input type='number' class='form-control' id='cost' name='cost' placeholder='00.00'>"+
											"</div>"+
											"<div class='form-group col-md-11 text-center'>"+
												"<button type='button' class='btn btn-success' onclick=\"buildingMaintananceServer('Building_maintanance')\" value='add'>Add</button>"+
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
		                                "Building Maintanance Table"+
		                            "</div>"+
		                            "<div class='panel-body' id='view_table'>"+

		                            "</div>"+
								"</div>"+
							"</div>"+
						"</div>";
	
	document.getElementById("tab-content").innerHTML=interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_buildingMaintananceInterface.php',POST_AJAX_buildingMaintananceInterface);
}

function POST_AJAX_buildingMaintananceInterface(response_text)
{
	var res = new Array();
	res = response_text.split(",");
	document.getElementById("Building_idbuilding").innerHTML = res[0];
	document.getElementById("view_table").innerHTML = res[1];
}

function buildingMaintananceServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/BuildingMaintananceServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function deleteBuildingMaintananceData(idbuildingMaintanance)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_BuildingMaintananceData.php', POST_AJAX_view_table, 
			'idmaintanance='+idbuildingMaintanance);
	}
}

function thingMaintananceInterface()
{
	var interface ="<div class='row'>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Thing Maintanance Entry"+
		                            "</div>"+
		                            "<div class='panel-body'>"+
										"<form class='form-horizontal col-md-offset-1' id='thing_maintanance'>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Things_idthings'>Select Thing :</label>"+
												"<select class='form-control' id='Things_idthings' name= 'Things_idthings'></select>"+
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='plant'>Repair Name :</label>"+
												"<input type='text' class='form-control' id='plant' name='name' placeholder='Repair Name here'>"+
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='cost'>Cost :</label>"+
												"<input type='number' class='form-control' id='cost' name='cost' placeholder='00.00'>"+
											"</div>"+
											"<div class='form-group col-md-11 text-center'>"+
												"<button type='button' class='btn btn-success' onclick=\"thingMaintananceServer('thing_maintanance')\" value='add'>Add</button>"+
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
		                                "Thing Maintanance Table"+
		                            "</div>"+
		                            "<div class='panel-body' id='view_table'>"+

		                            "</div>"+
								"</div>"+
							"</div>"+
						"</div>";
	
	document.getElementById("tab-content").innerHTML=interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_thingMaintananceInterface.php',POST_AJAX_thingMaintananceInterface);
}

function POST_AJAX_thingMaintananceInterface(response_text)
{
	var res = new Array();
	res = response_text.split(",");
	document.getElementById("Things_idthings").innerHTML = res[0];
	document.getElementById("view_table").innerHTML = res[1];
}

function thingMaintananceServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/ThingMaintananceServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function deleteThingMaintananceData(idThingMaintanance)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_ThingMaintananceData.php', POST_AJAX_view_table, 
			'idrepair='+idThingMaintanance);
	}
}