/*******************************************************************************
* functions for user interface, transerfer the data to the server              *
*                                                                              *
*******************************************************************************/
function addClassInterface()
{
	var interface = "<div class='row'>"+
						"<div class='col-md-6'>"+
							"<div><br/></div>"+
							"<div class='panel panel-primary'>"+
	                            "<div class='panel-heading text-center'>"+
	                                "Class Entry"+
	                            "</div>"+
	                            "<div class='panel-body'>"+
									"<form class='form-horizontal col-md-offset-1' id='add_class'>"+
										"<div class='form-group col-md-11'>"+
											"<label for='nameClass'>Name :</label>"+
											"<input type='text' class='form-control col-md-8' name='name' placeholder='Class Name here'>"+
										"</div>"+
										"<div class='col-sm-offset-3 col-sm-8'>"+										
											"<button type='button' class='btn btn-success' onclick=\"addClassServer('add_class');\" value='add' >Add</button>"+
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
	                                "Class Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+

	                            "</div>"+
							"</div>"+
						"</div>"+
					"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addClassInterface.php', POST_AJAX_view_table);
}

function addClassServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddClassServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function deleteClassData(idclass)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_ClassData.php', POST_AJAX_view_table, 'class_id='+idclass);
	}	
}

function editClassData(idclass)
{
	window.open("editAddClass.php?class_id="+idclass,"_self","");
}

function addSectionInterface()
{
	var interface = 	"<div class='row'>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Section Entry"+
		                            "</div>"+
		                            "<div class='panel-body'>"+
										"<!--form -->"+
										"<form class='form-horizontal col-md-offset-1' id='add_section'>"+
											"<div class='form-group col-md-11'>"+
												"<label for='nameSection'>Name :</label>"+
												"<input type='text' class='form-control col-md-8' name='name' placeholder='Section Name here'>"+
											"</div>"+
											"<div class='col-sm-offset-4 col-sm-8'>"+
												"<button type='button' class='btn btn-success' onclick=\"addSectionServer('add_section')\" value='add'>Add</button>"+
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
	                                "Section Table"+
	                            "</div>"+
	                            "<div class='panel-body' id='view_table'>"+

	                            "</div>"+
							"</div>"+
						"</div>"+
						"</div>";
	document.getElementById('tab-content').innerHTML = interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_addSectionInterface.php', POST_AJAX_view_table);
}

function addSectionServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/AddSectionServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function deleteSectionData(section_id)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_SectionData.php', POST_AJAX_view_table, 'Section_id='+section_id);
	}
}
function editSectionData(Section_id)
{
	window.open("editSectionName.php?Section_id="+Section_id,"_self","");
}
function mapSectionClassInterface()
{
	var interface ="<div class='row'>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Map Section Entry"+
		                            "</div>"+
		                            "<div class='panel-body'>"+
										"<form class='form-horizontal col-md-offset-1' id='gui'>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Class_idClass'>Select Class :</label>"+
												"<div id='Class_idClass1'>"+
													"<select class='form-control'></select>"+
												"</div>"+
											"</div>"+
											"<input type='hidden' id='Section_Section_id' name ='Section_Section_id'/>"+
										"</form>"+
									"</div>"+
								"</div>"+
							"</div>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary' id='panel'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Mapped Section Table"+
		                            "</div>"+
		                            "<div class='panel-body' id='view_table'>"+

		                            "</div>"+
								"</div>"+
							"</div>"+
						"</div>";
	
	document.getElementById("tab-content").innerHTML=interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_mapSectionClassInterface.php', POST_AJAX_mapSectionClassInterface);
}

function POST_AJAX_mapSectionClassInterface(response_text)
{
	document.getElementById("Class_idClass1").innerHTML = response_text;
}

function mapSectionClassServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/MapSectionClassServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}

function afterClassSelect_mapSectionClassInterface()
{
	var Class_idClass = document.getElementById('Class_idClass').value;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/LoadSectionClassCheckBox_inMapSectionClass.php', POST_AJAX_afterClassSelect_mapSectionClassInterface, "Class_idClass="+Class_idClass);
}
function POST_AJAX_afterClassSelect_mapSectionClassInterface(response_text)
{
	document.getElementById("view_table").innerHTML = response_text;
}
function onClickSectionCheckbox_inMapSectionClass(Section_Section_id, form_id)
{
	document.getElementById('Section_Section_id').value = Section_Section_id;
	var status = document.activeElement.checked;
	if(status == true)
	{
		var ajax_object = new Ajax();
		var url = ajax_object.create_url_data(form_id);
		ajax_object.processPOST('ajax_server/MapSectionClassServer.php',POST_AJAX_onClickSectionCheckbox_inMapSectionClass, url);
	}
	else
	{
		if(confirm("Are You Sure to delete.. ") == true)
		{
			var ajax_object = new Ajax();
			var url = ajax_object.create_url_data(form_id);
			ajax_object.processPOST('ajax_update/Delete_MappedSectionClass.php', POST_AJAX_afterDeleteData, url);
		}	
	}
}

function POST_AJAX_onClickSectionCheckbox_inMapSectionClass(response_text)
{
	alert(response_text);
}

function mapClassRoomInterface()
{
	var interface ="<div class='row'>"+
							"<div class='col-md-6'>"+
								"<div><br/></div>"+
								"<div class='panel panel-primary'>"+
		                            "<div class='panel-heading text-center'>"+
		                                "Map Entry"+
		                            "</div>"+
		                            "<div class='panel-body'>"+
										"<form class='form-horizontal col-md-offset-1' id='map_class_room'>"+
											"<div class='form-group col-md-11'>"+
												"<label for='building_idbuilding'>Building :</label>"+
												"<div class='form-group' id='building_idbuilding1'>"+
													"<select  class='form-control' name= 'building_idbuilding'>"+
														"<option value=''>Select</option>"+
													"</select>"+
												"</div>"+
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='idrooms'>Room :</label>"+
												"<div id='idrooms1' class='form-group'>"+
													"<select class='form-control'>"+
														"<option value=''>Select</option>"+
													"</select>"+
												"</div>"+
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='class_id1'>Class :</label>"+
												"<div class='form-group' id='class_id1'>"+
													"<select class='form-control'>"+
														"<option value=''>Select</option>"+
													"</select>"+
												"</div>"+
												
											"</div>"+
											"<div class='form-group col-md-11'>"+
												"<label for='Section_Section_id'>Section :</label>"+
												"<div class='form-group' id='Section_Section_id1'>"+
													"<select class='form-control'>"+
														"<option value=''>Select</option>"+
													"</select>"+
												"</div>"+
												
											"</div>"+
											"<div class='form-group text-center col-md-11'>"+
												"<button type='button' class='btn btn-success' onclick=\"mapClassRoomServer('map_class_room')\" value='add'>Add</button>"+
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
		                                "Mapped Class Table"+
		                            "</div>"+
		                            "<div class='panel-body' id='view_table'>"+

		                            "</div>"+
								"</div>"+
							"</div>"+
						"</div>";
	
	document.getElementById("tab-content").innerHTML=interface;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/PageData_mapClassRoomInterface.php',POST_AJAX_mapClassRoomInterface);
}

function POST_AJAX_mapClassRoomInterface(response_text)
{
	var res = new Array();
	res = response_text.split(",,");
	document.getElementById('building_idbuilding1').innerHTML=res[0];
	document.getElementById('view_table').innerHTML=res[1];
}
function AfterBuildingSelect_mapClassRoomInterfaceClass()
{
	var building_idbuilding = document.getElementById('building_idbuilding').value;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/AfterBuildingSelect_mapClassRoomInterface.php', POST_AJAX_afterBuildingSelect_mapClassRoomInterface,
	 'building_idbuilding='+building_idbuilding);
}
function POST_AJAX_afterBuildingSelect_mapClassRoomInterface(response_text)
{
	document.getElementById("idrooms1").innerHTML = response_text;
}
function afterRoomSelect_inMapRoomClassInterface()
{
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/AfterRoomSelect_mapClassRoomInterface.php', POST_AJAX_afterRoomSelect_mapClassRoomInterface,
	 'building_idbuilding='+building_idbuilding);	
}
function POST_AJAX_afterRoomSelect_mapClassRoomInterface(response_text)
{
	document.getElementById('class_id1').innerHTML = response_text;
}

function afterClassSelect_inMapRoomClassInterface()
{

	var idclass = document.getElementById('class_id').value;
	var ajax_object = new Ajax();
	ajax_object.processPOST('ajax_server/AfterClassSelect_mapClassRoomInterface.php', POST_AJAX_afterClassSelect_mapClassRoomInterface,
	 'class_id='+idclass);	
}
function POST_AJAX_afterClassSelect_mapClassRoomInterface(response_text)
{
	document.getElementById('Section_Section_id1').innerHTML = response_text;
}
function delete_MappedRoomClass(Rooms_idRooms,idclass_sec)
{
	if(confirm("Are You Sure to delete.. ") == true)
	{
		var ajax_object = new Ajax();
		ajax_object.processPOST('ajax_update/Delete_MappedClassRoomData.php', POST_AJAX_view_table, 'idclass_sec='+idclass_sec+'&Rooms_idRooms='+Rooms_idRooms);
	}
}

function mapClassRoomServer(form_id)
{
	if(!Empty_check(form_id))
	{
		var ajax_obj = new Ajax();
		var url = ajax_obj.create_url_data(form_id);
		ajax_obj.processPOST("ajax_server/MapClassRoomServer.php", POST_AJAX_view_table, url);
	}
	else
		alert("Empty Field Not Allowed...");
}