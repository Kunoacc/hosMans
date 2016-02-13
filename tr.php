



  <?php
  session_start();
  //connectivity
  include 'config.php';

  if(isset($_SESSION['user_id']))
  {
  if($_POST['c1']==$_POST['c2'])
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
  	//$img = $_FILES['file']['name'];

  //check user if already exists
  $q = "SELECT reg FROM all_data WHERE reg='$reg'";
  $cq = mysql_query($q);
  $ret = mysql_num_rows($cq);
  if($ret == true)
  {
  	echo $msg="Username already exists";
  }
  //insert into database
  else
  {
  	$query = "INSERT INTO all_data VALUES ('','$fname', '$lname', '$reg', '$email', '$number', '$pass', '$s_name', '$s_num',
      '$status', '$gender', '$session', '$dept', '$level', '$address')";
  	mysql_query($query);
  	//mkdir("images/".$_POST['umail']);
  	//move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_POST['umail']."/".$_FILES['file']['name']);
  	echo $msg="Registration Successful";
  }
  }
  else
  {
  	echo $msg=
  "<script>
    alert('Wrong Verification Code, try again!')
    </script>"  ;
  }
  ?>















  Read more: http://mrbool.com/how-to-create-a-sign-up-form-registration-with-php-and-mysql/28675#ixzz3tdVubBc2











  <?php
  if(isset($_POST['action']))
  {

  	if($_POST['action']=="connect")
      {
  			if($_POST['c1']==$_POST['c2'])
  		  {
  		  $fname =  mysqli_real_escape_string($connection, $_POST['fname']);
  		  $lname =  mysqli_real_escape_string($connection, $_POST['lname']);
  		  $reg =  mysqli_real_escape_string($connection, $_POST['reg']);
  		  $email =  mysqli_real_escape_string($connection, $_POST['email']);
  		  $pass =  mysqli_real_escape_string($connection, $_POST['pass']);
  		  $number =  mysqli_real_escape_string($connection, $_POST['num']);
  		  $s_name =  mysqli_real_escape_string($connection, $_POST['s_name']);
  		  $s_num =  mysqli_real_escape_string($connection, $_POST['s_num']);
  		  $status =  mysqli_real_escape_string($connection, $_POST['status']);
  		  $gender =  mysqli_real_escape_string($connection, $_POST['gender']);
  		  $session =  mysqli_real_escape_string($connection, $_POST['session']);
  		  $dept =  mysqli_real_escape_string($connection, $_POST['dept']);
  		  $level =  mysqli_real_escape_string($connection, $_POST['level']);
  		  $address =  mysqli_real_escape_string($connection, $_POST['address']);

          $query = "SELECT reg FROM all_data where reg='".$reg."'";
          $result = mysqli_query($connection,$query);
          $numResults = mysqli_num_rows($result);
          if (!filter_var($reg, FILTER_VALIDATE_EMAIL)) // Validate email address
          {
              $message =  "Invalid email address please type a valid email!!";
          }
          elseif($numResults>=1)
          {
              $message = $reg." already exist!!";

          }
  				else
          {
              mysql_query("INSERT INTO `all_data` (fname, lname, reg, email, pass, num, s_name, s_num, status, gender, session, dept, level, address)
                                 VALUES ('$fname', '$lname', '$reg', '$email', '$pass' '$number', '$s_name', '$s_num', '$status', '$gender',
                                  '$session', '$dept', '$level', '$address') ");
              $message = "Signup Sucessfully!!";
      }
   ?>
