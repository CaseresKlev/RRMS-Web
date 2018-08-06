<!-- ANNE -->

<?php

session_start();

  $uname = $_POST['username'];
  $upass = $_POST['password'];

  #echo $uname . " " . $upass;

  include_once 'connection.php';
  $dbconfig = new dbconfig();
  $con = $dbconfig->getCon();
  $query = "SELECT `id`, `g_name`, `activate`, `type` FROM `account` WHERE u_name='$uname' AND password='$upass'";
  $result = $con->query($query);

  if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
      $_SESSION["id"] = $row['id'];
      $_SESSION["g_name"] = $row['g_name'];
      $_SESSION["activate"] = $row['activate'];
      $_SESSION["type"] = $row['type'];
    }

echo $_SESSION["id"] . " " . $_SESSION["g_name"] . " " . $_SESSION["activate"] . " " . $_SESSION["type"];

  }
  else {
    echo "Your username and password do not match. Please try again.";
  }





 ?>
