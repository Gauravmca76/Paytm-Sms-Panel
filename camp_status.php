<?php
date_default_timezone_set('Asia/Kolkata');
include('db.php');

$from_date = $_POST['data'];

$to_date = $_POST['data1'];

$dest_num = $_POST['data2'];

$sender_id = $_POST['data3'];

$username = $_POST['data4'];

$status = $_POST['data5'];

$array = array();

if($from_date != '')
{
	if($to_date != '')
	{
		$var1 = strtotime($from_date);
		$var2 = strtotime($to_date);
		for($currentDate = $var1;$currentDate <= $var2;$currentDate+=(86400))
		{
			$stor = date('Y-m-d',$currentDate);
			$array[] = $stor;
		}

		foreach ($array as $value) 
		{
			echo '<tr>';
			echo'<td>'.$value.'</td>';
			echo '</tr>';
		}
	}
	else
	{
		echo '<tr>';
		echo '<td colspan="7" style="text-align:center;"><span style="text-align: center; color:red;">The Ending Date is required!!!</span></td>';
		echo '</tr>';
	}
}
else
{
	echo '<tr>';
	echo '<td colspan="7" style="text-align:center;"><span style="text-align: center; color:red;">The Starting Date is required!!!</span></td>';
	echo '</tr>';
}


?>