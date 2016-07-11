<?php
session_start();

if (isset($_SESSION['user']))
{
	header('location:dashboard.php?option=Home');
	exit();
}
//connectivity
include 'config.php';

if(isset($_POST['login']))
{
	$u = $_POST['reg'];
	$pass = $_POST['pass'];
	$p = md5($pass);
	$_SESSION['user']=$u;
	$_SESSION['pass']=$p;
	//user check
	$q = "SELECT * FROM all_data WHERE reg='$u' AND pass='$p'";
	$cq = mysql_query($q);
	$ret = mysql_num_rows($cq);
	if($ret == true)
	{
		header('Location: dashboard.php?option=Home');
	}
	else
	{
		echo "<center><h2 style='color:red'>ACCESS DENIED</h2></center>";
	}
}


?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap/bootstrap-theme.min.css">
	<link rel="stylesheet" href="resources/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/material/material.min.css">
	<link rel="stylesheet" href="resources/css/add.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hos-MANS</title>
</head>

<body>
	<div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
		<header class="demo-header mdl-layout__header mdl-layout__header--scroll mdl-color--grey-1001 mdl-color-text--grey-800">
			<div class="mdl-layout__header-row"><a href="index.php">
				<span class="mdl-layout-title1">HMS</span></a>
				<div class="mdl-layout-spacer"></div>
			</div>
		</header>
		<div class="demo-ribbon"></div>
		<main class="demo-main mdl-layout__content">
			<div class="demo-container mdl-grid">
				<div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
				<div class="demo-content1 mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col"
				style="padding = 0px;">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li class="" data-target="#myCarousel" data-slide-to="1"></li>
						<li class="" data-target="#myCarousel" data-slide-to="2"></li>
						<li class="" data-target="#myCarousel" data-slide-to="3"></li>
						<li class="" data-target="#myCarousel" data-slide-to="4"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="images/Hostel/1.jpg" alt="university">
						</div>

						<div class="item">
							<img src="images/Hostel/3.jpg" alt="set name">
						</div>

						<div class="item">
							<img src="images/Hostel/5.jpg" alt="set alt message" >
						</div>

						<div class="item">
							<img src="images/Hostel/2.jpg" alt="Flower" >
						</div>

						<div class="item">
							<img src="images/Hostel/4.jpg" alt="stuff" >
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
			<div class="brk">
				<div class="home-big">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">HOW TO USE</h4>
						</div>
					</div>
					<ul>
						<li><p>
								Navigate to the registration(SIgn-Up) page.
							</p></li>
						<li><p>
								fill the form with all correct details.
							</p></li>
						<li><p>
								Both username and passwords nust not be above 20 characters. password must also be alphanumeric
							</p></li>
						<li><p>
								If sign-up is unsuccessful after multiple attempts please contact the admin
							</p></li>
						<li><p>
								Else after successful registration please login to access your portal.
							</p></li>
						<li><p>
								From the portal page you will be able to yourself a room if still avalible.
							</p></li>
						<li><p>
								Thanks for your impending co-operation :-)
							</p></li>
					</ul>
				</div>
				<div class="home-small">
					<div class="panel-group" id="accordion">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#nelly">SIGN IN</a>
								</h4>
							</div>
							<div id="nelly" class="panel-collapse collapsein">
								<div class="panel-body">
									<form class="form-horizontal" method="post">
										<div class="form-group" form-group-lg="" style="margin-right = -200px;">
											<div class="col-sm-4">
												<input type="text" class="form-control" id="Email_user" placeholder="Matric. No" name="reg">
											</div>
										</div>
										<div class="form-group" form-group-sm="" style="margin-right = -200px;">
											<div class="col-sm-2">
												<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="pass">
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-4">
												<button type="submit" class="btn btn-primary" name="login"><img src="images/orite.png"></img> SIGN IN </button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="panel panel-primary">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#packtpubcollapse2">SIGN UP</a>
								</h4>
							</div>
							<div id="packtpubcollapse2" class="panel-collapse
					collapse">
								<div class="panel-body">
									<p class="versatile">No account with us yet?</p>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-4">
											<a href="Sign-Up.php">
												<button type="button" class="btn btn-primary" id="stuff">SIGN UP</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
	<br><br><br><br>


</main>
	<footer class="demo-footer mdl-mini-footer">
		<div class="mdl-mini-footer--left-section">
			<ul class="mdl-mini-footer--link-list">
				<li>&copy 2015</li>
				<li>Salem University</li>
			</ul>
		</div>
	</footer>

</div>
<script src="resources/js/jquery-1.11.2.min.js"></script>
<script src="resources/js/material/material.min.js"></script>
<script src="resources/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
