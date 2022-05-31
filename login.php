<?php

session_start();
include('db.php');

$user = $_POST['data'];
$pass = $_POST['data1'];

$query = mysqli_query($con,"SELECT * FROM `users` WHERE username='".$user."' AND password='".$pass."'");
$row = mysqli_fetch_array($query);
$num = mysqli_num_rows($query);
$active = $row['active'];
$dbpass = $row['password'];
$dbuser = $row['username'];

if($num > 0)
{
	if($user == $dbuser)
	{
		if($pass == $dbpass)
		{
			if($active == 'active')
			{
				$usernm=$row['username'];
				$_SESSION['username'] = $usernm;
				$_SESSION['full_name'] = $row['full_name'];
				$_SESSION['user_type'] = $row['user_type'];
				echo '<script type="text/javascript">location.href = "dashboard.php";</script>';
			}
			else
			{
				echo'<p>Your account is inactive. Contact your administrator to activate it.</p>';
			}
		}
		else
		{
			echo'<p>Password not match. Please retry.</p>';
		}
	}
	else
	{
		echo'<p>User doesn\'t exist. Contact your administrator for this user.</p>';
	}
}
else
{
	echo'<p>Unable to login. Contact your administrator.</p>';
}

?>