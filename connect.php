
<?php
include 'config.php';

function NewUser()
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$reg = $_POST['reg'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$number = $_POST['num'];
	$s_name = $_POST['s_name'];
	$s_num = $_POST['s_num'];
	$status = $_POST['status'];
	$gender = $_POST['gender'];
	$session = $_POST['session'];
	$dept = $_POST['dept'];
	$level = $_POST['level'];
	$address = $_POST['address'];

	$query = "INSERT INTO all_data VALUES ('','$fname', '$lname', '$reg', '$email', '$number', '$pass', '$s_name', '$s_num',
		'$status', '$gender', '$session', '$dept', '$level', '$address')";
		$data = mysql_query ($query)or die(mysql_error());
		if($data)
		{
			echo "YOUR REGISTRATION IS COMPLETED...";
		}
	}

	function SignUp()
	{
		if(!empty($_POST['user_id']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
		{
			$query = mysql_query("SELECT * FROM websiteusers WHERE reg = '$_POST[reg]' AND pass = '$_POST[pass]'") or die(mysql_error());

			if(!$row = mysql_fetch_array($query) or die(mysql_error()))
			{
				newuser();
			}
			else
			{
				echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
			}
		}
		?>
