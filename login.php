


<?php
include 'config.php';
session_start();
ob_start();
if(isset( $_SESSION['user_id'] ))
{
    header('Location: index.php?msg=isnot');
}
else {

  if(isset( $_POST['reg'], $_POST['pass']))
  {
      $mat_no = htmlentities(mysql_real_escape_string(trim($_POST['reg'])));
      $pass = $_POST['pass'];
      $query = "SELECT * FROM all_data WHERE reg = '$mat_no' AND pass = '$pass'";
      $query_run = mysql_query($query);
      if(mysql_num_rows($query_run) == 1)
      {
        header('Location: dashboard.php');
      }
      else {
          header('Location: index.php?msg=exist');
      }

  }else {
    header('Location: index.php?msg=invalid');
  }

}


 ?>
