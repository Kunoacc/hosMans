<?php
session_start();

$timeout = 60 * 120; // Number of seconds until it times out.

// Check if the timeout field exists.
if(isset($_SESSION['timeout'])) {
  // See if the number of seconds since the last
  // visit is larger than the timeout period.
  $duration = time() - (int)$_SESSION['timeout'];
  if($duration > $timeout) {
    // Destroy the session and restart it.
    session_destroy();
    header('location:login.php');
  }
}

// Update the timeout field with the current time.
$_SESSION['timeout'] = time();

//require config.php
require ('../config.php');

//session validity
if(isset($_SESSION['admin']) == 0)
{
  header('location: login.php');
  exit();
}

$query = "SELECT * FROM admin WHERE username = '".$_SESSION['admin']."'";
$ex = mysql_query($query);
$row = mysql_fetch_array($ex);
//room query
if ($row['username'] == 'admin1'){
  $opt1 = "Banabas";
  $opt2 = "Banabas Annex";
  $opt3 = "";
  $opt4 = "";
}
elseif($row['username'] == 'admin2'){
  $opt1 = "Faith";
  $opt2 = "Faith Annex";
}
elseif($row['username'] == 'adinell'){
  $opt1 = "Banabas";
  $opt2 = "Faith";
  $opt3 = "Banabas Annex";
  $opt4 = "Faith Annex";
}
?>

<html>
<head>
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="resources/css/bootstrap/bootstrap-theme.min.css">-->
  <link rel="stylesheet" href="resources/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="resources/css/material/material.min.css">
  <link rel="stylesheet" href="admin.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>profile</title>
</head>
<body>

  <!-- The drawer is always open in large screens. The header is always shown,
  even in small screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">Admin Console</span>
      <div class="mdl-layout-spacer"></div>
      <a href="logout.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary">Logout</button></a>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp">
        </div>
      </div>
    </div>
  </header>
  <main class="mdl-layout__content">
    <div class="page-content">
      <div class="google">
        <div class="command">
          <h4 align="center">---Query---</h4>
          <hr />
          <form method="post">
          <div class="labas-label">
            <div class="labelr"><label for="hostel">Hostel</label></div>
            <div class="labelr"><label for="r_type">Room Type</label></div>
            <div class="labelr"><label for="room_no">Room Number</label></div>
          </div>
          <div class="labas-input">
            <div class="input">
              <select class="form-control" name="hostel" required><option></option>
                <option><?php echo $opt1 ?></option>
                <option><?php echo $opt2 ?></option>
                <option><?php echo $opt3 ?></option>
                <option><?php echo $opt4 ?></option>
              </select>
            </div>
            <div class="input">
              <select class="form-control" name="r_type" required><option></option>
                <option>Standard</option>
                <option>Executive</option>
              </select>
            </div>
            <div class="input">
              <select class="form-control" name="room_no" required><option></option>
                <option><?php echo $opt1 ?></option>
                <option><?php echo $opt2 ?></option>
                <option><?php echo $opt3 ?></option>
                <option><?php echo $opt4 ?></option>
              </select>
            </div>

          </div>
            <br />
            <div class="option"><input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary" value="SEARCH" name="hostel_q"/></div>
            <hr />
            <div class="option"><input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary" value="UNALLOCATED" name="no_hostel"/></div>
            <hr />
              <div class="option"><input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--primary" value="PRINT ALL" name="print"/></div>
            <hr />
          </form>
        </div>
        <div class="info">12345</div>
      </div>
    </div>
  </main>
</div>
  <script src="resources/js/jquery-1.11.2.min.js"></script>
  <script src="resources/js/material/material.min.js"></script>
  <script src="resources/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
