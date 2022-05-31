function showModalValidity()
{
	alert("Hi");
	$("#form-bp2-validity").modal();
}
function validateUser()
{  
 //alert("Hello");
 var user = document.getElementById("txtUserName").value;
 var pass = document.getElementById("txtPassword").value;
 var xmlHttp;
 try
  {    
  // Firefox, Opera 8.0+, Safari    
  xmlHttp=new XMLHttpRequest();   
  }
 catch (e)
  {    
   // Internet Explorer  
   try
   {     
	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch (e)
	{      
	  try
	  {        
		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");   
	   }
	  catch (e)
	  {      
		alert("Your browser does not support AJAX!");  
		return false;      
	   }  
	 }
	}
	xmlHttp.onreadystatechange=function()
	  {
		  if(xmlHttp.readyState==1)
		  {
			  document.getElementById("loader").innerHTML="<img src='img/loading.gif'>";
		  }
		  if(xmlHttp.readyState==4)
			{
				//alert("Hello5");
				var string=xmlHttp.responseText;
				//alert("Hello2");
				//alert(string);
				var obj = JSON.parse(string);
				//alert(obj.Status);
				var responseCode=obj.Status;
				if(responseCode=="OK"){
					document.getElementById("loader").innerHTML="";
					if(obj.Response.EnableOtpLogin==1){
						//showModalValidity();
						pid=obj.Response.UserId;
						//alert(pid);
						document.getElementById("hpid").value=pid;
						$("#myModal").modal();
					} else {
						window.location.href="login.php?edata="+obj.Response.Data;
					}
				} else {
					document.getElementById("loader").innerHTML="";
					document.getElementById("lblInfo").innerHTML=obj.Response.ShowMessage;
				}
			}
	  }
	//alert(user);
	//alert(pass);
	var params ="usr="+user+"&pwd="+pass;
	var url = "loginapi.php";
	//var url = "http://127.0.0.1:8080/txtuno/loginapi.php?"+params;
	//alert(url);
	xmlHttp.open("POST",url,true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send(params);
}