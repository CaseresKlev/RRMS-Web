<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Create Accounts </title>
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
                <span> USERNAME </span>
                <h2> Instructor </h2>
              </div>
            </div>
            <!--/menu profile quick info-->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <div class="nav side-menu">
				<ul><a href= "MyDocx.php"> MY DOCUMENTS </a> </ul>
                  <ul><a href= "#accounts"> ACCOUNTS </a></ul>
                    <ul class="nav child_menu">
						<a class= "dashboard-active" href= "createAcc.php"> Add </a></br>
						<a href= "activateAcc.php"> Activate Accounts </a>
                    </ul> </br>
                  <ul><button id= "btn-logout"><strong> <a href="#Logout"> LOGOUT </a></strong></button></ul>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
			<form class= "frm-createAcc" action="/action_page.php">
				<div class="frm-container">
				<h1> CREATE ACCOUNTS </h1>
				<p> Please fill in this form to create an account. </p>
			<hr></br>
			<label for="Name"><b> Name :</b></label> 
				<input type="text" placeholder="Enter name" name="Name" required> </br></br>
			
			<label for="username"><b> Username :</b></label>
				<input type="text" placeholder="Enter username" name="username" required> </br></br>
				
			<label for="psw"><b> Password :</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required> </br></br>

			<label for="psw-repeat"><b> Repeat Password :</b></label>
				<input type="password" placeholder="Repeat Password" name="psw-repeat" required> </br></br>
			<fieldset class= "fieldset-validity">
				<legend> Validity </legend>
				
					<input type="radio" checked="checked" name="radio">
					<label class="tbl-search_container" id="search_title"> Forever 
						<span class="tbl-search_checkmark"></span>
					</label>
					
					<input type="radio" name="radio">
					<label class="tbl-search_container" id="search_content"> 1 year 
						<span class="tbl-search_checkmark"></span>
					</label></br></br>
					
					<b> Specify: </b></br>
					<input type="date" name="specify" style= "float: right">
					
			</fieldset></br>
			<hr>
		<button type="submit" class="btn-register">Register</button>
				</div>
			
		</form>
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

  </body>
</html>
