<?php

session_start();
session_unset();
session_destroy();

?>

<html lang="en"><head>
	<meta charset="utf-8">
	<title>Web SMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes"> 
	
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/pages/signin.css" rel="stylesheet" type="text/css">
	
	<script language="javascript" type="text/javascript" src="appscripts/jslogin.js"></script>
	<script language="javascript" type="text/javascript">
	function validate()
	{
		if(document.getElementById("txtUserName").value.length==0)
		{
			alert("Enter Username");
			document.getElementById("txtUserName").focus();
			return false;
		}
		else if(document.getElementById("txtPassword").value.length==0)
		{
			alert("Enter Password.");
			document.getElementById("txtPassword").focus();
			return false;
		}
	}
	</script>
	<style>
.anim-bg{background:url(img/Login-GIF.gif) no-repeat fixed center 20%; background-size: 100%;}
.account-container{width: 350px; float: right; margin: 150px 100px 0 0; box-shadow: 0 0px 10px rgba(0,0,0,0.25); border-radius: 10px;}
.account-container h1{color: #3f1b36;}
.login-fields input{margin: 0; padding: 0; color: #333;box-shadow:none; background: white; border: none; border-bottom: 1px solid #8F8F8F; margin:10px 0px}
.login-extra{ margin:0 auto 20px; width: auto;}
.btn-onex{background-color: #582c4f; border-color: #582c4f; font-weight: bold;color: #fff!important; width:80%; margin: auto; display: block; border-radius: 10px;}
.btn-onex:hover{background: #773e6b; border-color: #773e6b;}
.btn-onex:active{background: #582c4f;}
.login-logo{text-align: center; margin: 10px 0 30px -35px;}
.login-logo img{width: 60%}
.field{position: relative;}
.field .usr{position: absolute; right: 0; top: 10px; background: url(img/user.png); height: 18px; width: 18px;}
.field .pswd{position: absolute; right: 0; top: 10px; background: url(img/password.png); height: 18px; width: 18px;}
</style>
</head>
<body class="anim-bg">
<div class="account-container">
	<div class="content clearfix">
		<form method="post" onkeypress="validateKey(event);">
			<h1>Member Login</h1>&nbsp;<div id="loader" name="loader"></div>	
			<div class="login-fields">
				<div class="field">
					<div class="usr"></div>
					<label for="txtUserName">Username</label>
					<input type="text" id="txtUserName" name="txtUserName" value="" placeholder="Username">
				</div> <!-- /field -->
				<div class="field">
					<div class="pswd"></div>
					<label for="txtPassword">Password:</label>
					<input type="password" id="txtPassword" name="txtPassword" value="" placeholder="Password">
				</div> <!-- /password -->
			</div> <!-- /login-fields -->
			<button type="button" id="cmdSubmit" name="cmdSubmit" class="button btn btn-onex  btn-large btn-block" onclick="validate();">Login</button>
		</form>
	</div> <!-- /content -->
	<span id="errorMsg" style="text-align: center;"></span>
</div> <!-- /account-container -->
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/signin.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cmdSubmit').click(function(){
			var usernm = $('#txtUserName').val();
			var userpass = $('#txtPassword').val();
			$.ajax({
				url:'login.php',
				type:'POST',
				data:({data:usernm, data1:userpass}),
				success:function(res){
					$('#errorMsg').html(res);
				}
			});
		});
	});
</script>
</body></html>