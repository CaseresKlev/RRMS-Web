<?php
  ob_start();
  include_once 'connection.php';

  $gname= $_POST['groupname'];
  $uname= $_POST['uname'];
  $pass= $_POST['password'];
  $access = $_POST['access'];
  //echo $access;

  //echo "FROM " . $gname . " " . $uname . " " . $pass;



  $dbconfig1 = new dbconfig();
  $conn1 = $dbconfig1->getCon();
  $query1 = "SELECT * FROM `acesskey` WHERE acesskey COLLATE latin1_general_cs LIKE 'U5Ly68hy'";




  $dbconfig = new dbconfig();
  $conn = $dbconfig->getCon();
//$id = $_GET['book_id'];
  //$query = "INSERT INTO `account` (`id`, `g_name`, `u_name`, `password`) VALUES (NULL, '$gname', '$uname', '$pass');";
  $query = "INSERT INTO `account` (`id`, `g_name`, `u_name`, `password`, `activate`, `type`) VALUES (NULL, '$gname', '$uname', '$pass', '0', 'user');";
  $result = $conn->query($query);

  if ($result) {

     echo "Success: Account Successfully Created!";


  //  header("Location: login.php");


  }else {
    echo "Error: Username and Password are Already Existed!";
  }
//header('Location: login.php');




?>
