<?php



 $username = $_POST['user'];
 $password = $_POST['pass'];
 
 
 $username = stripcslashes($username);
 $password = stripcslashes($password);
 $username = mysql_real_escape_string($username);
 $password = mysql_real_escape_string($password);
 
 
 mysql_connect("localhost", "root", "");
 mysql_select_db("db_rrms");
 
 
 
 
 
 $result = mysql_query("SELECT $id from login WHERE username= '$username' and password= '$password'")
	or die("Failed to query database".mysql_error());
$row = mysql_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password ){
	header('location: instuctordashboard.php');
	echo "Login success! Welcome".$row['username'];
} else {
	echo "Failed to login";
}


?>