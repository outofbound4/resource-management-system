/*******************************************************************************
* functions for user interface, transerfer the data to the server              *
*                                                                              *
*******************************************************************************/
function addGuardenInterface()
{
	var interface ="<div class='row'>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Guarden Entry"+
		                            "</div>"+
		                            "<div class='panel-body'>"+
										"<form class='form-horizontal col-md-offset-1' id='add_guarden'>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Building_idbuilding'>Select Building :</label>"+
												"<select class='form-control' id='Building_idbuilding' name= 'Building_idbuilding'></select>"+
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='name'>Guarden Name :</label>"+
												"<input type='text' class='form-control' id='name' name='name' placeholder='Guarden Name here'>"+
											"</div>"+
											"<div class='form-group col-md-11 text-center'>"+
												"<button type='button' class='btn btn-success' onclick=\"addGuardenServer('add_guarden')\" value='add'>Add</button>"+
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
		                                "Guarden Table"+
		                            "</div>"+
		                            "<div class='panel-body' id='view_table'>"+

		                            "</div>"+
								"</div>"+
							"</div>"+
						"</div>";
	
	document.getElementById("tab-content").innerHTML=interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addGuardenInterface.php',POST_AJAX_addGuardenInterface);
}

function addGuardenServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddGuardenServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function POST_AJAX_addGuardenInterface(response_text)
{
	var res = new Array();
	res = response_text.split(",");
	document.getElementById("Building_idbuilding").innerHTML = res[0];
	document.getElementById("view_table").innerHTML = res[1];
}

function deleteGurdenData(idguarden)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_GurdenData.php', POST_AJAX_view_table, 
			'idguarden='+idguarden);
	}
}

function editGuardenData(idguarden)
{
	window.open("editGuardenName.php?idguarden="+idguarden,"_self","");
}
function addPlantInterface()
{
	var interface ="<div class='row'>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Phone Entry"+
		                            "</div>"+
		                            "<div class='panel-body'>"+
										"<form class='form-horizontal col-md-offset-1' id='add_plant'>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Guarden_idguarden'>Select Guarden :</label>"+
												"<select class='form-control' id='Guarden_idguarden' name= 'Guarden_idguarden'></select>"+
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='plant'>Plant Name :</label>"+
												"<input type='text' class='form-control' id='plant' name='plant' placeholder='Plant Name here'>"+
											"</div>"+
											"<div class='form-group col-md-11 text-center'>"+
												"<button type='button' class='btn btn-success' onclick=\"addPlantServer('add_plant')\" value='add'>Add</button>"+
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
		                            "<div class='panel-body' id='view_table'>"+

		                            "</div>"+
								"</div>"+
							"</div>"+
						"</div>";
	
	document.getElementById("tab-content").innerHTML=interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addPlantInterface.php',POST_AJAX_addPlantInterface);
}

function addPlantServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddPlantServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function POST_AJAX_addPlantInterface(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById("Guarden_idguarden").innerHTML = res[0];
	document.getElementById("view_table").innerHTML = res[1];
}

function deletePlantData(idplant)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_PlantData.php', POST_AJAX_view_table, 
			'idplant='+idplant);
	}
}