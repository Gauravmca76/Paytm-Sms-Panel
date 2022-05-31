<?php

include('header.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Web SMS</title>
    <style type="text/css">
        .box
        {          
          width: 300px;
          border: 15px solid black;
          padding: 50px;
          margin: 20px;
          color: black;
          box-sizing: border-box;
        }
    </style>
</head>
<body>
	<div class="container" >
        <div class="row" style="margin-top:20px">
            <div class="col-md-6 col-md-offset-4">
            	<h1 class="page_title">Bulk SMS SENDING TOOL</h1><br/>
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                            <fieldset>
								<div class="form-group">
									<label style="color:black;">Sender ID*</label>
                                    <input class="form-control" value="" name="sender_id" type="text"  required placeholder="Enter Sender ID">
                                </div>

                                <div class="form-group" style="width: 500px;height: 500px;border: 3px solid black;margin: 10px;box-sizing: border-box; position:relative;">
                                    <div class="form-group" style="width: 100%;height: 30px;border: 2px solid black;box-sizing: border-box;position: absolute;top: 0;margin-top: 0; border-color: Gray;">
                                        &nbsp;<label style="color:black;">Upload File</label>
                                    </div>

                                    <div class="form-group" style="width: 100%;height: 50px;border: 2px solid black;box-sizing: border-box;position: absolute;bottom: 0;margin-bottom: 0;">

                                        <a> Import the number list </a>

                                    </div>
                                </div>

								<div class="form-group">
									<label style="color:black;">Enter Your message</label>
                                    <textarea class="form-control" name="msg" maxlength='154' style="height: 140pt;"></textarea>
                                </div>
								<div class="form-group">
               						<input name="register" type="submit" value="Send Message" class="btn  btn-primary">
                				</div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>