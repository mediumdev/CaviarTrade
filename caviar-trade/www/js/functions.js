function showClock()
{
	var obj = document.getElementById('clock');
	var req;
	
	if (window.XMLHttpRequest)	req = new XMLHttpRequest();
	else if(window.ActiveXObject)
	{
		try
		{
			req = new ActiveXObject('Msxml2.XMLHTTP');  
		}
		catch (e){}	
										
		try
		{											
			req = new ActiveXObject('Microsoft.XMLHTTP');
		} catch (e){}
	}
	
	if (req)
	{
		req.onreadystatechange = function()
		{
			if (req.readyState == 4 && req.status == 200)  
			{
				obj.innerHTML = 'Московское время '+req.responseText;
			}        
		}
		req.open("POST", 'php/clock.php', true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.send('clock=1&ajax=1');
	}
}

setInterval(showClock, 3000); 