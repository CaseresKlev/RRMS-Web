<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Administrator </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/editDocument.css">
	
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
					<ul><a href="instructordashboard.php"> DOCUMENTS </span></a></ul>
					<ul><a href="accesscode(instruc).php"> ACCESS CODE </a> </ul>      
					<ul><a href="reports(instruc).php"> REPORTS </a> </ul> </br>      
					<ul><button id= "btn-logout"><strong> <a href="#Logout"> LOGOUT </a></strong></button></ul>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
			<div class="frm-container" style="margin: auto; width: 80%; margin-top: 5%">
				<center><h1 style= "font-family: Century Gothic"> EDIT DOCUMENT </h1></center>
			<hr></br>
			<div id="bookDet">
                <p class="edittxt" style= "font-family: Century Gothic; font-size: 16px">
                Title: </br>
                  <input type="text" placeholder="book title" id="title" name="title" 
				  style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic">
                </p>
                <p class="edittxt" style= "font-family: Century Gothic; font-size: 16px">
                Author:</br>
                  <textarea rows="2" cols="102" placeholder="author" name="author" id="author" 
						style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic"></textarea>
                </p>
                <p class="edittxt">
					<table width= 100%>
						<tr>
							<td style= "font-family: Century Gothic; font-size: 16px"> 
								Status: 
								<select name="status" id="status" style= "width: 80%">
									<option> select status </option>
									<option> Proposed </option>
									<option> Completed </option>
									<option> Disseminated </option>
									<option> Published </option>
								</select>
							</td>
							<td> </td>
						</tr>
						<tr>
							
							<td>
								<fieldset class= "fieldset-disseminated" style= "width: 90%">
									<legend><i> if disseminated </i></legend> <center>
										<input type="radio" checked="checked" name="radio">
										<label class="tbl-radiocontainer" id="local"> Local 
											<span class="tbl-radiocheckmark"></span>
										</label>
					
										<input type="radio" name="radio">
										<label class="tbl-radiocontainer" id="international"> International 
											<span class="tbl-radiocheckmark"></span>
										</label> </center>
								</fieldset> 
							</td>
							<td> 
								<fieldset class= "fieldset-published" style= "width: 90%">
									<legend><i> if published </i></legend> <center>
										ISDN: 
										<input type="text/number" placeholder="serial number" id="serial" name="serial"></br></br>
					
										Journal: 
										<input type="text" placeholder="journal name" id="name" name="name"> </center>
								</fieldset> 
							</td>
						</tr>
					</table>
                </p>
                <p class="edittxt" style= "font-family: Century Gothic; font-size: 16px">
                Cited:<br>
                  <textarea rows="2" cols="102" placeholder="cite" name="cite" id="cite" 
				  style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic"></textarea>
                </p></br>
                <hr></br>
				<button type="submit" id= "instructor-btn-save" class="btn-save"> SAVE </button>
            </div>
			</div>
          <!-- top tiles -->
          <div class="row tile_count"></div>
          <!-- /top tiles -->
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
