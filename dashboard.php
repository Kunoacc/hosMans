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
    header('location:index.php');
  }
}

// Update the timeout field with the current time.
$_SESSION['timeout'] = time();
//require config.php
require ('config.php');

//session validity
if(isset($_SESSION['user']) == 0)
{
  header('location:index.php');
  exit();
}
//User details
$query = "SELECT * FROM all_data WHERE reg = '".$_SESSION['user']."'";
$first = mysql_query($query);
$row = mysql_fetch_array($first);
//image source
if ($row['gender'] == 'Male') {
  $src = 'images/male.png';
}
else {
  $src = 'images/female.png';
}

?>



<html>
<head>
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="resources/css/bootstrap/bootstrap-theme.min.css">-->
  <link rel="stylesheet" href="resources/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="resources/css/material/material.min.css">
  <link rel="stylesheet" href="resources/css/dash.css">
  <link rel="stylesheet" href="resources/css/add.css">
  <link rel="stylesheet" href="resources/css/dashboard.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>profile</title>
</head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600 bruv">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title"><?php echo $_GET['option']; ?></span>
            <div class="mdl-layout-spacer"></div>
        <!-- Colored raised button -->
        <a href="logout.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Logout</button></a>

        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
          <img src="images/vert.png" />
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
          <a href="dashboard.php?option=About"> <li class="mdl-menu__item">About</li></a>
        </ul>
      </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
      <header class="demo-drawer-header">
        <img src="<?php echo $src; ?>" class="demo-avatar">
          <span></span>
          <div class="mdl-layout-spacer"></div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="dashboard.php?option=Home"><img class="link" src="images/home.png" role="presentation"></img>Home</a>
          <a class="mdl-navigation__link" href="dashboard.php?option=Room"><img class="link" src="images/room.png" role="presentation"></img>Room</a>
          <a class="mdl-navigation__link" href="dashboard.php?option=Profile"><img class="link" src="images/profile.png" role="presentation"></img>Profile</a>
          <a class="mdl-navigation__link" href="dashboard.php?option=Password"><img class="link" src="images/pass.png" role="presentation"></img>Change Password</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="mailto:nellyatuonwu@gmail.com"><img class="link" src="images/help.png" role="presentation"></img><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>
      <?php
      $opt = $_GET['option'];
      // next, we lay out the conditions...
      ?>


      <?php
      // for Home
      if ($opt == 'Home') { ?>
        <main class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-grid demo-content">
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
              <div class="welcome">
                Welcome Back  <?php
                echo $row['fname']; ?>
              </div>
            </div>
            <div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
              <table class="table">
                <thead class="thead-inverse">
                  <tr>
                    <th class="mdl-data-table__cell--non-numeric">Fields</th>
                    <th>User Information</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Name</td>
                    <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                  </tr>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Reg. Number</td>
                    <td><?php echo $row['reg']; ?></td>
                  </tr>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Email</td>
                    <td><?php echo $row['email']; ?></td>
                  </tr>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Mobile Number</td>
                    <td><?php echo $row['num']; ?></td>
                  </tr>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Sponsor's Name</td>
                    <td><?php echo $row['s_name']; ?></td>
                  </tr>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Sponsor's Number</td>
                    <td><?php echo $row['s_num']; ?></td>
                  </tr>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Gender</td>
                    <td><?php echo $row['gender']; ?></td>
                  </tr>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Department</td>
                    <td><?php echo $row['dept']; ?></td>
                  </tr>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Current Level</td>
                    <td><?php echo $row['level']; ?></td>
                  </tr>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Address</td>
                    <td><?php echo $row['address']; ?></td>
                  </tr>
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">Room Number</td>
                    <td><?php

                      echo $row['room_no']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
              <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                  <h2 class="mdl-card__title-text">Updates</h2>
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                  Latest updates from the school board
                </div>
                <div class="mdl-card__actions mdl-card--border">
                  <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a>
                </div>
              </div>
              <div class="demo-sepx
        <?php  } ?>

      <?php
        // For Update
        if ($opt == 'Profile') { ?>
          <?php
          if (isset($_POST['saver'])) {
            $email = $_POST['email'];
            //$pass = $_POST['pass'];
            //$p = md5($pass);
            $number = $_POST['num'];
            $s_name = $_POST['s_name'];
            $s_num = $_POST['s_num'];
            $status = $_POST['status'];
            $session = $_POST['session'];
            $dept = $_POST['dept'];
            $level = $_POST['level'];
            $address = $_POST['address'];
            //$new_pass = $_POST['new_pass'];
            //$conf = $_POST['conf_new_pass'];
            //$p1 = md5($new_pass);
            //$p2 = md5($conf);
            if ($_POST['email'] == "") {
              $msg='please fill in your new email';
              echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            }
            else {
              $query = "UPDATE all_data SET email = '$email', num = '$number', s_name = '$s_name', s_num = '$s_num',
              status = '$status', session = '$session', dept = '$dept', level = '$level', address = '$address' WHERE reg ='".$_SESSION['user']."'";
              mysql_query($query);
              $msg='Update Successful';
              echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            }
          }
          ?>

          <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-grid demo-content">
              <div class="detat"><form method="post">
                <div class="update-details">
                  <div class="update-details-title">
                    Personal Information
                  </div>
                  <div class="too-many">
                    <div class="labels">
                      <div class="labas"><label for="num">Mobile Number: </label></div>
                      <div class="labas"><label for="s_name">Sponsor's Name: </label></div>
                      <div class="labas"><label for="s_num">Sponsor's Number: </label></div>
                      <div class="labas"><label for="status">Status: </label></div>
                      <div class="labas"><label for="session">Session: </label></div>
                      <div class="labas"><label for="department">Department: </label></div>
                      <div class="labas"><label for="level">Level: </label></div>
                      <div class="labas"><label for="address">Address: </label></div>
                    </div>
                    <div class="labels-input">
                      <div class="labas"><div class="form-group">
                        <div class="input-group input-group-sm">
                          <input type="mobile" class="form-control" name="num" placeholder="Mobile" value="<?php echo $row['num']; ?>"required/>
                        </div>
                      </div></div>

                      <div class="labas"><div class="form-group">
                        <div class="input-group input-group-sm">
                          <input type="text" class="form-control" name="s_name" placeholder="Sponsor's Name" value="<?php echo $row['s_name']; ?>"required/>
                        </div>
                      </div></div>

                      <div class="labas"><div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control" name="s_num" placeholder="Sponsor's Number" value="<?php echo $row['s_num']; ?>"required/>
                        </div>
                      </div></div>
                      <!-- Status-->
                      <div class="labas"><div class="form-group">
                        <div class="input-group input-group-sm">
                          <select class="form-control" name="status" required>
                            <option value="">Status</option>
                            <option>Fresher</option>
                            <option>Returning</option>
                          </select>
                        </div>
                      </div></div>

                      <!-- Session-->
                      <div class="labas"><div class="form-group">
                        <div class="input-group input-group-sm">
                          <select class="form-control" name="session" required>
                            <option value="">Session</option>
                            <option>2012 - 2013</option>
                            <option>2013 - 2014</option>
                            <option>2014 - 2015</option>
                            <option>2015 - 2016</option>

                          </select>
                        </div>
                      </div></div>
                      <!-- session -->

                      <!-- Department-->
                      <div class="labas-label"><div class="form-group">
                        <div class="input-group input-group-sm">
                          <input type="text" class="form-control" name="dept" placeholder="Department" value="<?php echo $row['dept']; ?>"required></input>
                        </div>
                      </div></div>
                      <!-- Department -->

                      <!-- Level-->
                      <div class="labas"><div class="form-group">
                        <div class="input-group input-group-sm">
                          <select class="form-control" name="level" required>
                            <option value="<?php echo $row['level']; ?>"></option>
                            <option>100</option>
                            <option>200</option>
                            <option>300</option>
                            <option>400</option>
                          </select>
                        </div>
                      </div></div>
                      <!-- Level -->

                      <!-- address-->
                      <div class="labas"><div class="form-group">
                        <div class="input-group input-group-sm">
                          <textarea placeholder="Permanent Address" name="address" required style="width: 100%;"><?php echo $row['address']; ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div></div>
                </div>



                <!--Details three -->
                <div class="update-details three">
                  <div class="input-password">
                    <div class="update-details-title">
                      Change Email
                    </div>
                    <h1></h1>
                    <div class="current-mail">
                      <label>Current Email:</label>
                    </div>
                    <div class="form-group">
                      <div class=" dalign">
                        <?php echo $row['email']; ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group input-group-sm">
                        <input type="email" class="form-control" name="email"  id="email" placeholder="New Email" required/>
                      </div>
                    </div>
                  </div>
                </div>
                <input type="submit" name="saver" value="UPDATE" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"
                style="margin-top: 33%; margin-left: 36%;" />
              </form></div>
            </div>
          </main>

        <?php  } ?>

  <?php
  // for password change
  if ($opt == 'Password') { ?>
    <?php
    if (isset($_POST['saver'])) {
      $pass = $_POST['pass'];
      $p = md5($pass);
      $new_pass = $_POST['new_pass'];
      $conf = $_POST['conf_new_pass'];
      $p1 = md5($new_pass);
      $p2 = md5($conf);
      if ($p == $_SESSION['pass'] && $p1 == $p2) {
        $query = "UPDATE all_data SET pass = '$p1' WHERE reg ='".$_SESSION['user']."'";
        mysql_query($query);
        $msg = 'Password Successfully Changed';
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
      }
      else {
        $msg = 'Password combination incorrect, please try again.';
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
      }
    }
    ?>

    <main class="mdl-layout__content mdl-color--grey-100">
      <div class="mdl-grid demo-content">
        <div class="detat"><form method="post">

          <!--Details two-->
          <div class="update-details two">
            <div class="update-details-title">
              Change Password
            </div>
            <div class="input-password">
              <div class="labas">
                <div class="form-group">
                  <div class="input-group input-group-sm">
                    <input type="password" class="form-control" name="pass" placeholder="Current Password" required/>
                  </div>
                </div>
              </div>

              <div class="labas">
                <div class="form-group">
                  <div class="input-group input-group-sm">
                    <input type="password" class="form-control" name="new_pass" placeholder="New Password" required/>
                  </div>
                </div>
              </div>

              <div class="labas">
                <div class="form-group">
                  <div class="input-group input-group-sm">
                    <input type="password" class="form-control" name="conf_new_pass" placeholder="New Password" required/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" name="saver" value="UPDATE" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"
          style="margin-top: 27%; margin-left: 36%;" />
        </form>
      </div>
    </div>
  </main>

  <?php } ?>

  <?php
  // for Room(allocation)
   if ($opt == 'Room') { ?>
     <?php if ($row['room_no'] == "") {  ?>
<?php
  //check availability
  if (isset($_POST['check'])) {
    $hostel = $_POST['hostel'];
    $type = $_POST['r_type'];
    if ($hostel == 'Banabas' && $type == 'Standard') {
      $query = 'SELECT room_no, COUNT(*) as available FROM banabas_sr GROUP BY room_no
                HAVING count(available) BETWEEN 0 AND 5';
      $ex = mysql_query($query);
    }
    elseif ($hostel == 'Banabas' && $type == 'Executive'){
        $query = 'SELECT room_no, COUNT(*) as available FROM banabas_er GROUP BY room_no
                HAVING count(available) BETWEEN 0 AND 5';
        $ex = mysql_query($query);
    }
    elseif ($hostel == 'Banabas-Annex' && $type == 'Standard') {
      $query = 'SELECT room_no, COUNT(*) as available FROM male_annex GROUP BY room_no
              HAVING count(available) BETWEEN 0 AND 5';
      $ex = mysql_query($query);
    }
    elseif ($hostel == 'Banabas-Annex' && $type == 'Executive') {
      $msg = 'There are no Executive rooms in annex';
      echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    elseif ($hostel == 'Faith' && $type == 'Standard') {
      $query = 'SELECT room_no, COUNT(*) as available FROM faith_sr GROUP BY room_no
                HAVING count(available) BETWEEN 0 AND 5';
      $ex = mysql_query($query);
    }
    elseif ($hostel == 'Faith' && $type == 'Executive'){
        $query = 'SELECT room_no, COUNT(*) as available FROM faith_er GROUP BY room_no
                HAVING count(available) BETWEEN 0 AND 5';
        $ex = mysql_query($query);
    }
    elseif ($hostel == 'Faith-Annex' && $type == 'Standard') {
      $query = 'SELECT room_no, COUNT(*) as available FROM female_annex GROUP BY room_no
              HAVING count(available) BETWEEN 0 AND 5';
      $ex = mysql_query($query);
    }
    elseif ($hostel == 'Faith-Annex' && $type == 'Executive') {
      $msg = 'There are no Executive rooms in annex';
      echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
  }

  //register rooms
  if (isset($_POST['register'])) {
    $hostel = $_POST['hostel'];
    $type = $_POST['r_type'];
    $room = $_POST['av_rooms'];
    $name = $row['fname'].' '.$row['lname'];
    $reg = $row['reg'];
    $level = $row['level'];
    $dept = $row['dept'];

    $query1 = "UPDATE all_data SET room_no = '$room' WHERE reg ='".$_SESSION['user']."'";

    if ($hostel == 'Banabas' && $type == 'Standard') {
      $query2 = "INSERT INTO banabas_sr (room_no, name, reg, level, dept) VALUES ('$room', '$name', '$reg', '$level', '$dept')";
    }
    elseif ($hostel == 'Banabas' && $type == 'Executive'){
      $query = "INSERT INTO banabas_er (room_no, name, reg, level, dept) VALUES ('$room', '$name', '$reg', '$level', '$dept')";
    }
    elseif ($hostel == 'Banabas-Annex' && $type == 'Standard') {
      $query2 = "INSERT INTO male_annex (room_no, name, reg, level, dept) VALUES ('$room', '$name', '$reg', '$level', '$dept')";
    }
    elseif ($hostel == 'Faith' && $type == 'Standard') {
      $query2 = "INSERT INTO faith_sr (room_no, name, reg, level, dept) VALUES ('$room', '$name', '$reg', '$level', '$dept')";
    }
    elseif ($hostel == 'Faith' && $type == 'Executive'){
      $query2 = "INSERT INTO faith_er (room_no, name, reg, level, dept) VALUES ('$room', '$name', '$reg', '$level', '$dept')";
    }
    elseif ($hostel == 'Faith-Annex' && $type == 'Standard') {
      $query2 = "INSERT INTO female_annex (room_no, name, reg, level, dept) VALUES ('$room', '$name', '$reg', '$level', '$dept')";
    }
    mysql_query($query1);
    mysql_query($query2);
    $msg = $type.' room '.$room.' in '.$hostel.' hostel has successfully been secured' ;
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    header('refresh:0.1 ; url=dashboard.php?option=Home');

  }
 ?>

     <main class="mdl-layout__content mdl-color--grey-100">
       <div class="mdl-grid demo-content">
         <div class="detat">
           <div class="room-header">
             Room Allocation
           </div><form method="post">

             <div class="too-many">
               <div class="center-too-many">
                 <div class="label-room">
                   <div class="labas"><label for="hostel">Hostel: </label></div>
                   <div class="labas"><label for="r_type">Room Type: </label></div>
                 </div>
                 <div class="labels-input room">
                   <!--Hostel-->
                   <?php
                   if ($row['gender'] == 'Male') {
                     $option1 = 'Banabas';
                     $option2 = 'Banabas-Annex';
                   }
                   else {
                     $option1 = 'Faith';
                     $option2 = 'Faith-Annex';
                   }?>
                   <div class="labas"><div class="form-group">
                     <div class="input-group input-group-sm">
                       <select class="form-control" name="hostel" required>
                         <option></option>
                         <option><?php echo $option1; ?></option>
                         <option><?php echo $option2; ?></option>
                       </select>
                     </div>
                   </div></div>
                   <!--Hostel-->

                   <!--Room Type-->
                   <div class="labas"><div class="form-group">
                     <div class="input-group input-group-sm">
                       <select class="form-control" name="r_type" required>
                         <option></option>
                         <option>Executive</option>
                         <option>Standard</option>
                       </select>
                     </div>
                   </div></div>
                   <!--Room Type-->


                 </div>

                 <input type="submit" name="check" value="CHECK AVAILABILITY" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="magic" />

                 <div class="label-room">
                   <div class="labas"><label for="av_rooms">Available rooms: </label></div>
                 </div>
                 <div class="labels-input room" id="available">
                   <!--Room Class-->
                   <div class="labas"><div class="form-group">
                     <div class="input-group input-group-sm">
                       <select class="form-control" name="av_rooms">
                         <option></option>
                         <?php
                while($stuff = mysql_fetch_array($ex))
                {
                    echo '<option value="'.$stuff['room_no'].'">'.$stuff['room_no']. '</option>';
                }
                ?>
                       </select>
                     </div>
                   </div></div>
                   <!--Room Class-->
                 </div>

                 <input type="submit" name="register" value="REGISTER" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="magic" />

               </div>
               </div>
         </form>
       </div>
     </div>
   </main>
   <?php } ?>
 <?php if ($row['room_no'] !== "") { ?>
     <?php
     $msg = 'Sorry, you have already been registered to a room.';
     echo '<script type="text/javascript">alert("' . $msg . '")</script>';
     header('refresh:0.1 ; url=dashboard.php?option=Home');
      ?>
  <?php } ?>
<?php } ?>

      <?php

      if ($opt == 'About') { ?>
          <dialog class="mdl-dialog">

          </dialog>

        <script>
          var dialog = document.querySelector('dialog');
          var showDialogButton = document.querySelector('#show-dialog');
          if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
          }
          showDialogButton.addEventListener('click', function() {
            dialog.showModal();
          });
          dialog.querySelector('.close').addEventListener('click', function() {
            dialog.close();
          });
        </script>
      <?php } ?>

    </div>


    
                      <script src="resources/js/jquery-1.11.2.min.js"></script>
                      <script src="resources/js/material/material.min.js"></script>
                      <script src="resources/js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>
