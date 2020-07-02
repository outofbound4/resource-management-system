/********************************************************************************
* Empty check and Valid Email Check function									*
*																				*
********************************************************************************/
function Empty_check(formId)
{
	
	var elements = document.getElementById(formId).elements;
	var i;
	for (i=0; i<elements.length; i++)
	{
		if(elements[i].value=="" )
			return true;
	}
	return false;
}

function ValidateEmail(inputTextid)
{
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(document.getElementById(inputTextid).value.match(mailformat))
	{
		return true;
	}
	else
	{
		return false;
	}
}