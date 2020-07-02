/*******************************************************************************
* Ajax class for sending request to server                                     *
*                                                                              *
*******************************************************************************/
function Ajax()
{  
    //data members..........
    this.error = "";
    this.httpObject = null;
	this.complete = false;
    
	// body of constructor.... 
	try
    {
       if(window.ActiveXObject) this.httpObject=new ActiveXObject("Microsoft.XMLHTTP");
       else if (window.XMLHttpRequest) this.httpObject= new XMLHttpRequest();
       else  this.httpObject=null;
    }
    catch(e)
    {
        this.error=e;
        this.httpObject=null;
    }
	//alert("AJAX Object");
	
	
	this.processPOST=function(url, post_func, data='')
    {
		//alert("AJAX :: " + url+data);
		document.getElementById("ajax-loader").style.visibility = "visible";
		if(this.httpObject !== null)
        {
			var httpObject = this.httpObject;
			httpObject.open("POST", url);
			httpObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			httpObject.send(data);

            httpObject.onreadystatechange =  function()
            {
				if(httpObject.readyState == 4)
				{
					document.getElementById("ajax-loader").style.visibility = "hidden";
					this.complete = true;
					switch(httpObject.status)
					{
						case 200 : 	var res = httpObject.responseText.trim();
									post_func(res);
									break;
						case 403 :  alert("Forbidden...."); 		break;
						case 404 :  alert("Page not found...."); 	break;
					}
				}					
            };
		}
		else
		{
			document.getElementById(divId).innerHTML = "Ajax is not supported....";
		}
    };


    this.create_url_data = function(form_id)
	{	
		//alert("AJAX :: " + form_id);
		var elements = document.getElementById(form_id).elements;
		var url = "";
		var i;
		for (i=0; i<elements.length; i++)
		{
			if(elements[i].name == "") continue;
			if(i != 0 ) url += "&";
			url +=  elements[i].name + "=" + elements[i].value;
		}
		return url;
	}

	this.processGET=function(url, data, post_func)
    {
		//alert("AJAX :: " + url);
		var full_url = url + "?" + data;
		//document.getElementById("ajax-loader").style.visibility = "visible";  
		if(this.httpObject !== null)
        {
			var httpObject = this.httpObject;
			httpObject.open("GET",full_url , true);
            httpObject.send();
			
            httpObject.onreadystatechange =  function()
            {
                if(httpObject.readyState == 4)
				{
				//alert("READY :: " + url);
					//document.getElementById("ajax-loader").style.visibility = "hidden"; 
					this.complete = true;
					switch(httpObject.status)
					{
						case 200 : 	var res = httpObject.responseText.trim();
									post_func(res);
									break;
						case 403 :  alert("Forbidden...."); 		break;
						case 404 :  alert("Page not found...."); 	break;
					}
				}
            };
		}
		else
		{
			//document.getElementById(divId).innerHTML = "Ajax is not supported....";
		}
    };
}
