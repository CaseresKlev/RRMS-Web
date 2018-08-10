<?php
session_start();


  if(isset($_SESSION['uid'])){
    print_r($_SESSION);
  }else{
    header("Location: index(loyd).php");
  }

  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];

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
					<ul><a href="instructordashboard.php"> DOCUMENTS </span></a></ul>
					<ul><a class= "dashboard-active" href="#code"> ACCESS CODE </a> </ul>      
					<ul><a href="fiddle.php" target="_blank"> REPORTS </a> </ul> </br>
					<ul><a href="index(loyd).php"> Back to Home </a> </ul>      
					<ul><button id= "btn-logout"><strong> <a href="#Logout"> LOGOUT </a></strong></button></ul>
                </div>
              </div>

            </div>
          </div>
        </div>
       
        <!-- page content -->
        <div class="right_col" role="main">
			<div id= "instructor-frm-container" class="frm-container" style="margin: auto; width: 80%; margin-top: 5%">
				<center><b> GENERATE ACCESS CODE </b></center>
			<hr>
				<table style="width= 100%">
					<tr> 
						<td width= "50%"> <b> Number of Access Code: </b> </td>
						<td> <input type="number" placeholder="0" id="access-count" name="number" min="0" style= "width: 50%; font-size: 14pt" required> </td>
						<td><button type="submit" id= "instructor-frm-generate" class="btn-generate" style="font-size:12pt"> Generate </button></td>
					</tr>
				</table>
			<hr></br>
			</br> 
			<div id="printtable">
				<table style="width:100%"border="1" cellpadding="3" id="tbl-accescodes"  style="font-size: 15px; " >
					<center><h2> Available Student Codes </h2></center>
					<tr class="access-tr-head">
						<th id="access-th">Count</th>
						<th id="access-th">Access Codes</th>
						<th id="access-th">Type</th>
					</tr>
					<?php 
						include_once 'connection.php';
						$dbconfig = new dbconfig();
						$conn = $dbconfig->getCon();
						$query = "SELECT * FROM `acesskey` WHERE used=0 and type='Student'";
						$result = $conn->query($query);
						if($result->num_rows>0){
							$i=1;
							while($row=$result->fetch_assoc()){
								echo "<tr class=\"access-tr-head\">
										<th id=\"access-th\">$i</th>
											<th id=\"access-th\">" . $row['acesskey'] . "</th>
												<th id=\"access-th\">" . $row['type'] . "</th>
										</tr>";
										$i++;
							}
						}


					?>
					
				</table>
			</div>
			<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
				<br>
				<br>
			<hr>
			<button type="submit" id= "instructor-btn-print" class="btn-print" style="font-size: 14pt" onclick="printDiv()"> PRINT </button>
			
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
    <script type="text/javascript" src="js/accesscode.js"></script>
    <script>
		function printDiv() {
			
			 window.frames["print_frame"].document.body.innerHTML = "jmhngfvdvgbhkj,mhgfvdgbhjkkmhngf" + document.getElementById("printtable").innerHTML;
			 alert(window.frames["print_frame"].document.body.innerHTML = document.getElementById("printtable").innerHTML);
			 window.frames["print_frame"].window.focus();
			 window.frames["print_frame"].window.print();
		 }
		</script>
	
  </body>
</html>