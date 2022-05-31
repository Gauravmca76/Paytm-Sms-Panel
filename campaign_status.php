<?php
date_default_timezone_set('Asia/Kolkata');
include('header.php');
include('db.php');

$user_type = $_SESSION['user_type'];
$usernm = $_SESSION['username'];
$single_sms_date = date('Y_m_d');
$tablename = 'tbl_'.$single_sms_date.'_single_sms';
$todate = date('Y-m-d');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Web SMS</title>
	<style type="text/css">
		tr
		{
			color: black;
		}

		.link
		{
			text-align: center;
			font-size: 30px;
		}
	</style>
</head>
<body>
	<div class="container">
        <div class="row" style="margin-top:20px">
            <div class="col-md-12">
            	<br/><br/><h1 class="page_title">Campaign Status</h1><br/><br/>
            	<div>
            		<input type="hidden" id="username" value="<?php echo $_SESSION['username']  ?>">
            		<label for="begin" class="page_title">From date :</label>
            		<input type="date" id="begin" style="color: black;">
            		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            		<label for="end" class="page_title">To date :</label>
            		<input type="date" id="end" style="color: black;">
            		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            		<input name="options[]" type="checkbox" class="option justone" value="accept">&nbsp;<label for="accept" class="page_title">Accept</label>&nbsp;&nbsp;&nbsp;
            		<input name="options[]" type="checkbox" class="option justone" value="deliver">&nbsp;<label for="deliver" class="page_title">Delivered</label>&nbsp;&nbsp;&nbsp;
            		<input name="options[]" type="checkbox" class="option justone" value="fail">&nbsp;<label for="fail" class="page_title">Fail</label><br/><br/>
            		<input type="text" id="des_num" placeholder="Destination Number" id="des_num">&nbsp;&nbsp;&nbsp;
            		<input type="text" id="sender_id" placeholder="Sender ID" id="sender_id">&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-primary" id="search_camp_status"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></button>
            	</div><br/>
                <div class="panel table-responsive">
                	<?php

						$per_page_record = 10;
						if(isset($_GET['page']))
						{
							$page = $_GET['page'];
						}
						else
						{
							$page = 1;
						}
						$start_from = ($page - 1) * $per_page_record;
						//$query = mysqli_query($con,"SELECT * FROM ".$tablename." LIMIT $start_from,$per_page_record");
					?>
                	<table class="table table-striped table-condensed table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Sr No.</th>
					      <th scope="col">User name</th>
					      <th scope="col">Sender ID</th>
					      <th scope="col">Destination Number</th>
					      <th scope="col">Time(IST)</th>
					      <th scope="col">Message Content</th>
					      <th scope="col">Status</th>
					    </tr>
					  </thead>
					  <tbody id="camp_status">
					    <?php
					    	if($user_type == 'BA' || $user_type == 'IT')
					    	{
					    		//$query = mysqli_query($con,"SELECT * FROM `".$tablename."` WHERE date(send_date)='".$todate."'");
					    		$query = mysqli_query($con,"SELECT * FROM ".$tablename." WHERE date(send_date)='".$todate."' LIMIT $start_from,$per_page_record");
					    		while($row = mysqli_fetch_array($query))
					    		{
					    ?>
					    			<tr>
					    				<td><?php echo $row['id'];?></td>
					    				<td><?php echo $row['username'];?></td>
					    				<td><?php echo $row['sender_id'];?></td>
					    				<td><?php echo $row['mobile'];?></td>
					    				<td><?php echo $row['send_date'];?></td>
					    				<td><?php echo $row['msg_content'];?></td>
					    				<td><?php echo $row['msg_status'];?></td>
					    			</tr>
					    <?php
					    		}
					    	}
					    	if($user_type == 'LE')
					    	{
					    		//$query = mysqli_query($con,"SELECT * FROM `".$tablename."` WHERE date(send_date)='".$todate."' AND username='".$usernm."'");
					    		$query = mysqli_query($con,"SELECT * FROM ".$tablename." WHERE date(send_date)='".$todate."' AND username='".$usernm."' LIMIT $start_from,$per_page_record");
					    		while($row = mysqli_fetch_array($query))
					    		{
					    ?>
					    			<tr>
					    				<td><?php echo $row['id'];?></td>
					    				<td><?php echo $row['username'];?></td>
					    				<td><?php echo $row['sender_id'];?></td>
					    				<td><?php echo $row['mobile'];?></td>
					    				<td><?php echo $row['send_date'];?></td>
					    				<td><?php echo $row['msg_content'];?></td>
					    				<td><?php echo $row['msg_status'];?></td>
					    			</tr>
					    <?php
					    		}
					    	}
					    ?>
					  </tbody>
					</table>
					<div class="pagination" style="width: 100%;text-align: center;">
						<?php
					        $query = "SELECT COUNT(*) FROM $tablename";
					        $rs_result = mysqli_query($con, $query);
					        $row = mysqli_fetch_row($rs_result);
					        $total_records = $row[0];
					    	echo "</br>";
					        $total_pages = ceil($total_records / $per_page_record);
					        $pagLink = "";
					        if($page>=2)
					        {
					            echo "<a href='campaign_status.php?page=".($page-1)."'>Prev </a>";
					        }
					        for ($i=1; $i<=$total_pages; $i++)
					        {
					          if ($i == $page)
					          {
					              $pagLink .= "<a class = 'active link' href='campaign_status.php?page=".$i."'>".$i." </a>";
					          }            
					          else
					          {   
					              $pagLink .= "<a href='campaign_status.php?page=".$i."'>".$i." </a>";
					          }
					        };
					        echo $pagLink;
					        if($page<$total_pages){   
					            echo "<a href='campaign_status.php?page=".($page+1)."'>Next </a>";   
					        } 
					      ?>
					</div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#search_camp_status').click(function(){
    			var fromdt = $('#begin').val();
    			var todt = $('#end').val();
    			var dest_num = $('#des_num').val();
    			var sender_id = $('#sender_id').val();
    			var username = $('#username').val();
    			var chkbox = document.getElementsByName('options[]');
    			var vals='';
    			var n = chkbox.length;
    			for(var i=0; i<=n;i++)
    			{
    				if(i != n)
    				{
    					if(chkbox[i].checked)
    					{
    						vals+="'"+chkbox[i].value+"',";
    					}
    				}
    			}
    			var multi = vals.slice(0,-1);
    			$.ajax({
    				url:'camp_status.php',
    				type:'POST',
    				data:({data:fromdt, data1:todt, data2: dest_num, data3: sender_id, data4: username, data5: multi}),
    				success:function(res){
    					$('#camp_status').html(res);
    				}
    			});
    		});
    	});
    </script>
</body>
</html>