<?php

  session_start();


  if(isset($_SESSION['uid'])){
    print_r($_SESSION);
  }else{
    header("Location: index(loyd).php");
  }

  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];
  if($acctype==="admin"){
    echo "Admin ANG NAKALOGIN";
  }else if($acctype==="instructor"){
    //echo "Instructor ang naka login";

    header("Location: instructordashboard.php");
  }else if($acctype==="student"){
    echo "student ang naka login";
  }


  ?>




<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Administrator </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom.min.css">

</head>

<body class="nav-md">
    <div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a class="site_title"><span> Research Record Management System </span></a>
					</div>
					<div class="clearfix"></div>
			<!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="img/final.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span> <?php echo strtoupper($accname) ?> </span>
                <h2> <?php echo strtoupper($acctype) ?> </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <div class="nav side-menu">
					<ul><a class= "dashboard-active" href="#documents"> DOCUMENTS </span></a></ul>
					<ul><a href="updateAcc.php"> UPDATE ACCOUNT </a></ul>
					<ul><a href="accesscode.php"> ACCESS CODE </a> </ul>
					<ul><a href="fiddle.php"> REPORTS </a> </ul> </br>
          <ul><a href="index(loyd).php"> Back to Home </a> </ul>      
					<ul><button id= "btn-logout"><strong> <a href="#Logout"> LOGOUT </a></strong></button></ul>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
			<div id= "admin-frm-search" class= "frm-search" style= "font-size: 18px">
				<b> Search Documents </b>
				<input type="text" placeholder="Search.." id="search-key" name="search"><button type="button" id="btn-search"> Search </button> </br></br>
				<hr>

				<div id= "admin-div-voidmain" class= "div-voidmain">
          <ul>
            <?php
              $key = "";
              if(isset($_GET['search'])){
                  $key =  $_GET['search'];


                  include_once 'connection.php';
                  $dbconfig = new dbconfig();
                  $conn = $dbconfig->getCon();
                  $query = "SELECT book_id, book_title, cited FROM `book` WHERE book_title LIKE '%$key%'";
                  $result = $conn->query($query);
                  if($result->num_rows>0){
                    while ($row = $result->fetch_assoc()) {



            ?>
					<a href="editdocu.php?book_id=<?php echo $row['book_id']?>&title=<?php echo $row['book_title']; ?>&cited=<?php echo $row['cited'];?>" ><li style= "font-size: 14pt"> <u><b><?php echo $row['book_title']; ?></b></u><i>
            <?php
            $conn = $dbconfig->getCon();
                  $query = "SELECT author.a_lname as `lname`, SUBSTRING(a_fname, 1, 1) as `fname` FROM author INNER JOIN junc_authorbook on junc_authorbook.aut_id = author.a_id WHERE junc_authorbook.book_id=" . $row['book_id'];
                  $result2 = $conn->query($query);
                  if($result2->num_rows>0){
                    while ($row2=$result2->fetch_assoc()) {
                      echo " - " .  $row2['lname'] . ", " . $row2['fname'] . ";";
                    }
                  }
            ?>
          </i></li></a>

          <?php    }
            }else{
                echo "<div style='text-align:center; width 100%'><h4> No Result Found! </h4></div>";

            }/// end of result outer
          }
          ?>
          </ul>
			</div>
          <!-- top tiles -->
          <div class="row tile_count"></div>
          <!-- /top tiles -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

      </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>
    <script src="js/searchdoc.js"></script>

  </body>
</html>
