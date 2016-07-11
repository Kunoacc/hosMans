<?php
//connectivity
include 'config.php';

//Verification
	$num1 = range(9,0);
	$num2 = range(9,0);
	$rnum1 = array_rand($num1);
	$rnum2 = array_rand($num2);
	$n1 = $num1[$rnum1];
	$n2 = $num2[$rnum2];
	$sum = $n1 + $n2;
	$res = $n1." + ".$n2;

	if(isset($_POST['register']))
	{
		if($_POST['c1']==$_POST['c2'])
		{
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$reg = $_POST['reg'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$p = md5($pass);
			$number = $_POST['num'];
			$s_name = $_POST['s_name'];
			$s_num = $_POST['s_num'];
			$status = $_POST['status'];
			$gender = $_POST['gender'];
			$session = $_POST['session'];
			$dept = $_POST['dept'];
			$level = $_POST['level'];
			$address = $_POST['address'];

			//check user if already exists
			$q = "SELECT reg FROM all_data WHERE reg='$reg'";
			$cq = mysql_query($q);
			$ret = mysql_num_rows($cq);
			if($ret == true)
			{
				$msg = 'This user already exists';
				echo '<script type="text/javascript">alert("' . $msg . '")</script>';
			}
			//insert into database
			if($ret == false)
			{
				$query = "INSERT INTO all_data (`id`, `fname`, `lname`, `reg`, `email`, `pass`, `num`, `s_name`, `s_num`, `status`, `gender`, `session`, `dept`, `level`, `address`)
 						  VALUES ('','$fname', '$lname', '$reg', '$email', '$p', '$number', '$s_name', '$s_num', '$status', '$gender', '$session', '$dept', '$level', '$address')";
				mysql_query($query);
				$msg = 'Registration Successful!';
				echo '<script type="text/javascript">alert("' . $msg . '")</script>';
				header('Location: Sign-In.php');
			}
		}
		else
		{
			echo $msg = '<script>alert("Wrong Verification Code, try again!")</script>';
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

         <br>
<div id="stuffie">
<ul class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li class="active">Register</li>
</ul>
</div>

<div class="Sign-Up">
<div class="panel panel-primary">
			<div class="panel panel-heading">
			<h4 class="panel-title"><span class="glyphicon glyphicon-user"></span>&nbsp;HOSTEL ALLOCATION REGISTRATION
			</h4>
			</div>

<div class="panel panel-body" id="Sign-Up">
<form method="post">





<div class="form-group">
	<div class="input-group input-group-sm">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span></span>

    <input type="text" class="form-control" name="fname"  placeholder="First name" required/>
	</div>
</div>

<div class="form-group">
	<div class="input-group input-group-sm">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span></span>

    <input type="text" class="form-control" name="lname"  placeholder="Last name"/>
	</div>
</div>

<div class="form-group">
	<div class="input-group input-group-sm">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span></span>

    <input type="text" class="form-control" name="reg" placeholder="Matric No" required/>
	</div>
</div>



<div class="form-group">
	<div class="input-group input-group-sm">

		<span class="input-group-addon">
		 <span class="glyphicon glyphicon-envelope"></span></span>

	 <input type="email" class="form-control" name="email"  id="email" placeholder="Email" required/>
	</div>
</div>

	<div class="form-group">
	<div class="input-group input-group-sm">

		<span class="input-group-addon">
		 <span class="glyphicon glyphicon-lock"></span></span>

	 <input type="password" class="form-control" name="pass" placeholder="Password" required/>
	</div>
	</div>


	<div class="form-group">
	<div class="input-group input-group-sm">

		<span class="input-group-addon">
		 <span class="glyphicon glyphicon-user"></span></span>

	 <input type="mobile" class="form-control" name="num" placeholder="Mobile" required/>
	</div>
	</div>

<div class="form-group">
	<div class="input-group input-group-sm">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span></span>

    <input type="text" class="form-control" name="s_name" placeholder="Sponsor's Name" required/>
	</div>
</div>

<div class="form-group">
	<div class="input-group input-group-sm">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span></span>

    <input type="text" class="form-control" name="s_num" placeholder="Sponsor's Number" required/>
	</div>
</div>

	<div class="form-group">
	<div class="input-group input-group-sm">

		<span class="input-group-addon">
		 <span class="glyphicon glyphicon-user"></span></span>

	 <select class="form-control" name="status" required>
	 	<option value="">Status</option>
		<option>Fresher</option>
		<option>Returning</option>

	 </select>
	</div>
	</div>

<!-- gender-->
<div class="form-group">
	<div class="input-group input-group-sm">

		<span class="input-group-addon">
		 <span class="glyphicon glyphicon-user"></span></span>

	 <select class="form-control" name="gender" required>
	 	<option value="">Gender</option>
		<option>Male</option>
		<option>Female</option>

	 </select>
	</div>
</div>
<!-- gender-->

<!-- Session-->
<div class="form-group">
	<div class="input-group input-group-sm">

		<span class="input-group-addon">
		 <span class="glyphicon glyphicon-user"></span></span>

	 <select class="form-control" name="session" required>
	 	<option value="">Session</option>
		<option>2012 - 2013</option>
		<option>2013 - 2014</option>
		<option>2014 - 2015</option>
		<option>2015 - 2016</option>

	 </select>
	</div>
</div>
<!-- session -->

<!-- Department-->
<div class="form-group">
	<div class="input-group input-group-sm">

		<span class="input-group-addon">
		 <span class="glyphicon glyphicon-user"></span></span>
     <input type="text" class="form-control" name="dept" placeholder="Department" required/>
	</div>
</div>
<!-- Department -->

<!-- Level-->
<div class="form-group">
	<div class="input-group input-group-sm">

		<span class="input-group-addon">
		 <span class="glyphicon glyphicon-user"></span></span>

	 <select class="form-control" name="level" required>
	 	<option value="">Level</option>
		<option>100</option>
<option>200</option>
<option>300</option>
<option>400</option>
	 </select>
	</div>
</div>
<!-- Level -->

<!-- address-->
<div class="form-group">
	<div class="input-group input-group-sm">

		<span class="input-group-addon">
		 <span class="glyphicon glyphicon-home"></span></span>
	<textarea placeholder="Permanent Address" name="address" required style="width: 100%;"></textarea>
	</div>
</div>
<!-- Address -->
<br><br>
<!-- Verification -->
<div class="form-group">
  <fieldset class="ver"><p style="margin-left: 26px; text-decoration: none; font-size: 24px;"><strong>Verification</strong></p><p style="align-self: center;
     margin-right: 265px; margin-left: 60px;"><?php
error_reporting(1);
echo $res." = ";
?>
	<div class="input-group input-group-sm">
    <input type="hidden" name="c1" value="<?php echo $sum; ?>">
    <input type="text" name="c2" autofocus placeholder="Enter Sum" class="form-control"></p></fieldset>
</div>
   </div>

<!-- Verification -->

<!-- Submit -->
<div class="form-group" >
	<div class="input-group input-group-sm" style="margin:auto">
 <input type="submit" class="btn btn-primary"   value="REGISTER" name="register" />&nbsp;&nbsp;
<a href="Sign-In.php" class="btn btn-primary">ALREADY REGISTERED</a>
</div>
</div>
<!-- submit close-->

</form>
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
