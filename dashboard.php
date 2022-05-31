<?php
date_default_timezone_set('Asia/Kolkata');

include('header.php');
include('db.php');

$user = $_SESSION['username'];
$send_date = date('Y-m-d H:i:s');
$status = '';
$todate = date('Y-m-d');

$single_sms_date = date('Y_m_d');
$tablename = 'tbl_'.$single_sms_date.'_single_sms';
$sql1 = mysqli_query($con,"CREATE TABLE IF NOT EXISTS ".$tablename."(id INT NOT NULL AUTO_INCREMENT,username varchar(200) NOT NULL,send_date varchar(200) NOT NULL,mobile varchar(200) NOT NULL,sender_id varchar(200) NOT NULL,msg_content varchar(500) NOT NULL,msg_status varchar(20) NOT NULL,created_by TIMESTAMP DEFAULT CURRENT_TIMESTAMP,updated_by TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY (id))");
//$query = mysqli_query($con,"SELECT count(mobile) as cnt FROM `".$tablename."` WHERE date(send_date)='".$todate."' AND username='".$user."'");
$query = mysqli_query($con,"SELECT count(mobile) as cnt FROM `".$tablename."` WHERE date(send_date)='".$todate."'");
$row = mysqli_fetch_array($query);
$count = $row['cnt'];
$query1 = mysqli_query($con,"SELECT count(mobile) as cnt FROM `".$tablename."` WHERE date(send_date)='".$todate."' AND username='".$user."'");
$row1 = mysqli_fetch_array($query1);
$count1 = $row1['cnt'];
$totalsms = 5;
$remaing_sms = $totalsms - $count;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Web SMS</title>
	<style type="text/css">
		.card
		{
			background: #688eb9;
    		padding: 3px;
    		text-align: center;
    		border-radius: 25px;
		}

		.card-title
		{
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<br/><br/><h1 class="page_title">Quest SMS Campaign Panel</h1><br/>
		<h1> Welcome <?php echo $_SESSION['full_name'];  ?>,</h1><br/>
		<div class="row">
		  <div class="col-sm-4">
		    <div class="card">
		      <div class="card-body">
		        <h2 class="card-title">Today Total SMS</h2>
		        <p class="card-text"><?php echo $totalsms; ?></p>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-4">
		    <div class="card">
		      <div class="card-body">
		        <h2 class="card-title">Today Sent SMS</h2>
		        <p class="card-text"><?php echo $count1; ?></p>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-4">
		    <div class="card">
		      <div class="card-body">
		        <h2 class="card-title">Today Remaining SMS</h2>
		        <p class="card-text"><?php echo $remaing_sms; ?></p>
		      </div>
		    </div>
		  </div>
		</div>
		<h3> The important notes for <b>YOU</b> doing campaign on the panel (Please read rule no. 10 first) :</h3><br/>
		<ol style="list-style-type:upper-roman; line-height:200%;" type="1">
			<li>Write a proper Sender ID.</li>
			<li>Use '91' before all numbers is complusary.</li>
			<li>Only upload CSV file for bulk sms.</li>
			<li>Check the numbers before upload the CSV file. Number should be 10-digits only.</li>
			<li>Check the other fields also once you uploaded it can not be deleted from panel.</li>
			<li>For scheduling the campaign use "SCHEDULE MESSAGE SENDING TOOL".</li>
			<li>If you are using link in CSV files as data, then don't put "https://" OR "http://" before the link.</li>
			<li>In the panel sms content length is fixed. The panel not accepte any charachter in sms content after 156 characters.</li>
			<li>Schedule campaign is display in sending tool.</li>
			<li>If the sms exceed. The IT DEPARTMENT not responsible for that. So, befor doing campaign check your data limit and remaining sms count.</li>
			<li>The panel are follow the all tearm's & condition's of QUEST SOLUTIONS.</li>
		</ol>
	</div>
</body>
</html>