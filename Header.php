<?php

session_start();
if(isset($_SESSION['uid'])){
    print_r($_SESSION);
    $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];

  }else{
    //header("Location: index(loyd).php");
  }

  

?>

<!DOCTYPE html>
<html>
<title> Header </title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href= "css/header.css">
<link rel="stylesheet" href= "css/search2.css">

</head>

<body class= "header_body">
<div class="header" style= "width= 70%; margin: auto;" >
	<table width=100%>
		<tr>
			<td width="10%"><img width="100%" height="40%" style="display:block" src="img/1.png" ></td>
			<td width="15%"> <img width="100%" style="display:block" src="img/BukSU Logo.png"></td>
			<td> <div class="header_banner" ><span> Research Record Management System</span></div></td>
		</tr>
	</table>
	<br>
  <div class="header_nav1">

			<ul id= "nav-ul">
				<li><a href="index(loyd).php">Home</a></li>
				<li><a href="#plagiarism">Plagiarism</a></li>
				<!--<li style="float:right"><a class= "user-dropdown">User</a></li>-->
				<div class="dropdown" style="float:right">
					<a class="dropbtn" id="userli" >User</a>
					<?php
					echo "<div class="."\"dropdown-content\"" . ">";
						
						if(isset($_SESSION['uid'])){
							if($acctype==="instructor" || $acctype==="admin"){
								echo "<a href=" . "\"admindashboard.php\"" . "> My Dashboard </a>";
							}else{
								echo "<a href=". "\"groupdoclist.php?gid=" . $_SESSION['uid'] . "\"" . "> Documents </a>";
								echo "<a href=". "\"userchangepass.php\"" . "> Change Password </a>";
							}
								echo "<a href=". "\"logout.php\"" . ">LOGOUT</a>";
							
						
						
							
						
					}
						?>
					</div>
				</div>
				<li style="float:right;" id="btnLoginOut" ><a href="new-login.php">Login</a></li>
				<li style="float:right;" id="searchbtn">Search</li>
			</ul>


	<!--<u><a href="#username" style= "color: white;"> username </a></u>
	<a class="header_login" href="#login">Login</a>
	<button class= "header_btn"> Search </button>-->
  </div>
  <div style= "display: none;" class="header_search-container">

		<form action="searchcontent.php">
		<table id="tbl_search">
			<tr>
				<td> </td>
				<td> </td>
				<td> </td>
			</tr>
			<tr>
				<td> </td>
				<td> <input type="text" placeholder="Search.." name="search"> </td>
				<td> <button type="submit"> Search </button> </td>
			</tr>
			<tr>
				<td>

					<label class="tbl-search_container" id="search_title"> Title <input type="radio" checked="checked" name="radio">
						<span class="tbl-search_checkmark"></span>
					</label>
				</td>
				<td>

					<label class="tbl-search_container" id="search_content"> Content <input type="radio" name="radio">
						<span class="tbl-search_checkmark"></span>
					</label>
				</td>
				<td>

					<label class="tbl-search_container" id="search_key"> Keywords <input type="radio" name="radio">
						<span class="tbl-search_checkmark"></span>
					</label>
				</td>
			</tr>
		</table>
		</form>
  </div>
</div>
<script type= "text/javascript" src= "js/jquery-3.3.1.js"></script>
<script type= "text/javascript" src= "js/header.js"></script>
<?php if(!isset($_SESSION['uid'])){
	echo "<script> 
			$('#btnLoginOut').show();
			$('#userli').hide(); 
		</script>";
	//print_r($_SESSION);
}else{
	echo "<script> 
			$('#btnLoginOut').hide();
			$('#userli').html(\"" . $_SESSION['gname'] . "\");
			$('#userli').css(\"color\", \"yellow\");
		</script>";
} ?>

</body>
</html>
<!--TAPAYAN -->
