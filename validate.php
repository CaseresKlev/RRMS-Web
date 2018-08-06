<?php
  ob_start();
  include_once 'connection.php';

  $gname= $_POST['groupname'];
  $uname= $_POST['uname'];
  $pass= $_POST['password'];

  //echo "FROM " . $gname . " " . $uname . " " . $pass;


  $dbconfig = new dbconfig();
  $conn = $dbconfig->getCon();
//$id = $_GET['book_id'];
  $query = "INSERT INTO `account` (`id`, `g_name`, `u_name`, `password`) VALUES (NULL, '$gname', '$uname', '$pass');";
  $result = $conn->query($query);

  if ($result) {

     echo "Success: Account Successfully Created!";


  //  header("Location: login.php");


  }else {
    echo "Error: Username and Password are Already Existed! " ;
  }
//header('Location: login.php');




?>
