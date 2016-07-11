<?php
session_start();

if (isset($_SESSION['admin']))
{
	header('location:dashboard.php');
	exit();
}

//connectivity
include '../config.php';


if(isset($_POST['login']))
{
	$u = $_POST['username'];
	$pass = $_POST['password'];
	$p = md5($pass);
	$_SESSION['admin']=$u;
	$_SESSION['password']=$p;
	//user check
	$q = "SELECT * FROM admin WHERE username='$u' AND password='$p'";
	$cq = mysql_query($q);
	$ret = mysql_num_rows($cq);
	if($ret == true)
	{
		header('Location: dashboard.php');
	}
	else
	{
		echo "<center><h2 style='color:#ff0000'>ACCESS DENIED</h2></center>";
	}
}
?>



<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HMS | Admin Login</title>
    <!-- Adding CSS for Alignment -->
    <!-- Adding Material Design CSS file -->
    <link rel="stylesheet" href="resources/css/material/material.min.css">
    <link rel="stylesheet" href="resources/css/material/materialdesignicons.css" media="all" rel="stylesheet" type="text/css">
    <!-- Adding Material Design JS file -->
    <script src="resources/js/material/material.min.js"></script>
    <!-- Adding Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="admin.css">
</head>
<body>
	<div class="mdl-layout mdl-layout--fixed-header mdl-js-layout  mdl-color--white-100">
		<main class="mdl-layout__content main_content">
				<h3 align="center"><strong>HMS</strong></h3>
				<h4 align="center">Admin Login</h4>
				<div class="login-form-div mdl-grid mdl-shadow--16dp">
					<div id="dave">
						<form method="post">
							<div class="mdl-cell mdl-cell--12-col cell_con">
								<img src="../images/person.png"></img>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input" type="text" id="sample2" name="username" required />
									<label class="mdl-textfield__label" for="sample2">Enter Username</label>
								</div>
							</div>
							<div class="mdl-cell mdl-cell--12-col cell_con">
								<img src="../images/lock.png"></img>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input" type="password" id="sample2" name="password" required />
									<label class="mdl-textfield__label" for="sample2">Enter Password</label>
								</div>
							</div>
							<div class="mdl-cell mdl-cell--12-col  login-btn-con">
								<input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary btn" name="login" value="Login" />
							</div>
						</form>

				</div>
			</div>
	    </main>
    </div>
  </body>
</html>
