<?php

//connectivity
include 'config.php';


if(isset($_POST['logon']))
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
		header('Location: dashboard.php');
	}
	else
	{
		echo "<center><h2 style='color:red'>ACCESS DENIED</h2></center>";
	}
}

?>

<html>
<head>
    <link rel="stylesheet" href="resources/css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet"  href="resources/css/bootstrap/bootstrap-theme.min.css">
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
           <span class="mdl-layout-title1">HOS-MANS</span></a>
           <div class="mdl-layout-spacer"></div>
           <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="about.html">About-Us</a>
        <a class="mdl-navigation__link" href="contact.html">Contact-Us</a>
      </nav>
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

         <br>
<div id="stuffie">
<ul class="breadcrumb">
<li><a href="Index.php">Home</a></li>
<li><a href="Sign-Up.php">Register</a></li>
<li class="active">Sign In</li>
</ul>
</div>

<div class="Sign-Up">
<div class="panel panel-primary">
			<div class="panel panel-heading">
			<h4 class="panel-title"><span class="glyphicon glyphicon-user"></span>&nbsp;SIGN IN
			</h4>
			</div>

<div class="panel panel-body" id="Sign-Up">
<form method="post">





<div class="form-group">
	<div class="input-group input-group-sm">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span></span>

    <input type="text" class="form-control" name="reg"  placeholder="Matric No" required/>
	</div>
</div>

<div class="form-group">
	<div class="input-group input-group-sm">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span></span>

    <input type="password" class="form-control" name="pass"  placeholder="Password"/>
	</div>
</div>











<div class="form-group" >
	<div class="input-group input-group-sm" style="margin:auto">
 <input type="submit" class="btn btn-primary"   value="SIGN IN" name="logon" />
</div>
</div>
<!-- submit close-->

</form>
</div>
</div>
</div>



<footer class="demo-footer mdl-mini-footer">
  <div class="mdl-mini-footer--left-section">
    <ul class="mdl-mini-footer--link-list">
      <li>© 2015</li>
      <li>Nelly And Co.</li>
    </ul>
  </div>
</footer></main></div></div>








         <script src="resources/js/jquery-1.11.2.min.js"></script>
         <script src="resources/js/material/material.min.js"></script>
         <script src="resources/js/bootstrap/bootstrap.min.js"></script>
         </body>
         </html>
