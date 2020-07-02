/*******************************************************************************
* Ajax functions for transerfer the data to server                             *
*                                                                              *
*******************************************************************************/
function POST_AJAX_view_table(request_data)
{
	if(request_data=="exist")
		alert("Sorry! Same data entered");
	else
	document.getElementById('view_table').innerHTML = request_data;
}

function POST_AJAX_afterDeleteData(response_text)
{
	alert(response_text);
}