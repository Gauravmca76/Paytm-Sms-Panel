<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Web SMS</title>
</head>
<body>
	<div class="container" >
        <div class="row" style="margin-top:20px">
            <div class="col-md-6 col-md-offset-4">
            	<br/><br/><h1 class="page_title">Single SMS SENDING TOOL</h1><br/><br/>
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                    	<div id="msg"></div>
                        <form method="post">
                            <fieldset>
								<div class="form-group">
								<label style="color:black;">Sender ID*</label>
                                    <input class="form-control" value="" id="sender_id" type="text"  required placeholder="Enter Sender ID">
                                </div>
                                <div class="form-group">
								<label style="color:black;">Destination Number*</label>
                                    <input class="form-control" value="" id="des_num" type="text"  required placeholder="Enter Destination Number" maxlength='10'>
                                </div>
								<div class="form-group">
								<label style="color:black;">Enter Your message</label>
                                    <textarea class="form-control" id="msg_con" maxlength='154' style="height: 140pt;"></textarea>
                                </div>
								<div class="form-group">
               						<input name="register" type="button" value="Send Message" id="single_sms" class="btn  btn-primary">
                				</div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#single_sms').click(function(){
			var sendid = $('#sender_id').val();
			var des_num = $('#des_num').val();
			var msg = $('#msg_con').val();
			var msg_len = msg.length;
			if(sendid == '')
			{
				$('#msg').html('<div class="alert alert-danger alert-dismissible fade in"> Enter Sender ID...</div>');
			}
			else if(des_num == '')
			{
				$('#msg').html('<div class="alert alert-danger alert-dismissible fade in"> Enter destination number...</div>');
			}
			else if(msg == '')
			{
				$('#msg').html('<div class="alert alert-danger alert-dismissible fade in"> Enter message content...</div>');
			}
			else if(msg_len > 154)
			{
				$('#msg').html('<div class="alert alert-danger alert-dismissible fade in"> Message length more than 154 Characters.</div>');
			}
			else
			{
				$.ajax({
					url:'single_sms_send.php',
					method:'POST',
					data:({sender_id:sendid, number:des_num, content:msg}),
					success:function(res)
					{
						$('#msg').html('<div class="alert alert-success alert-dismissible fade in">'+res+'</div>');
					}
				});
			}
		});
	});
</script>
</html>