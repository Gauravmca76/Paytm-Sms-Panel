<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

include('db.php');

$user = $_SESSION['username'];
$sender_id = $_POST['sender_id'];
$mobile = $_POST['number'];
$msg = $_POST['content'];
$send_date = date('Y-m-d H:i:s');
$status = '';
$todate = date('Y-m-d');

$single_sms_date = date('Y_m_d');
$tablename = 'tbl_'.$single_sms_date.'_single_sms';

$query1 = mysqli_query($con,"SELECT count(mobile) as cnt FROM `".$tablename."` WHERE date(send_date)='".$todate."'");
$row1 = mysqli_fetch_array($query1);
$count1 = $row1['cnt'];

if($count1 < 5)
{
	$sql1 = mysqli_query($con,"CREATE TABLE IF NOT EXISTS ".$tablename."(id INT NOT NULL AUTO_INCREMENT,username varchar(200) NOT NULL,send_date varchar(200) NOT NULL,mobile varchar(200) NOT NULL,sender_id varchar(200) NOT NULL,msg_content varchar(500) NOT NULL,msg_status varchar(20) NOT NULL,created_by TIMESTAMP DEFAULT CURRENT_TIMESTAMP,updated_by TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY (id))");

	if($sql1)
	{
		$sql = mysqli_query($con,"INSERT INTO `".$tablename."`(`id`, `username`, `send_date`, `mobile`, `sender_id`, `msg_content`, `msg_status`) VALUES ('','".$user."','".$send_date."','".$mobile."','".$sender_id."','".$msg."','".$status."')");
		if($sql)
		{
			echo 'Accept';
		}
	}
}
else
{
	$query = mysqli_query($con,"SELECT count(mobile) as cnt FROM `".$tablename."` WHERE date(send_date)='".$todate."' AND username='".$user."'");
	$row = mysqli_fetch_array($query);
	$count = $row['cnt'];
	echo 'Today, you reach your sms credit. you send total sms todate: '.$count;
}

?>