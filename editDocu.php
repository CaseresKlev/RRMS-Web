
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
    echo "Instructor ang naka login";
  }else if($acctype==="student"){
    echo "student ang naka login";
  }

  if(isset($_GET['book_id'])){
      $book_id = $_GET['book_id'];
    }else{
       header("Location: admindashboard.php");
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
    <link rel="stylesheet" type="text/css" media="screen" href="css/editDocument.css">
	
</head>
  <input type="text" id="book_id" style="display: none" value="<?php echo $book_id; ?>">
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
                <span><?php echo strtoupper($_SESSION['gname']); ?></span>
                <h2> <?php echo strtoupper($_SESSION['type']);   ?> </h2>
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
                  <textarea placeholder="book title" id="title" name="title" 
				  style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold; resize: none;" readonly><?php echo $_GET['title'];?></textarea> 
                </p>
                <p class="edittxt" style= "font-family: Century Gothic; font-size: 16px">
                  <?php

                  include_once 'connection.php';
                  $dbconfig = new dbconfig();
                  $conn = $dbconfig->getCon();
                  $query = "SELECT author.a_fname as 'fname', CONCAT(SUBSTRING(author.a_mname, 1, 1),'.') as 'mi', author.a_lname as 'lname'  FROM  author INNER JOIN `junc_authorbook` on author.a_id = junc_authorbook.aut_id WHERE junc_authorbook.id = $book_id";
                  $result = $conn->query($query);
                  $author = array();
                  if($result->num_rows>0){
                    while ($row=$result->fetch_assoc()) {
                      $fullname = $row['fname'] . " " . $row['mi'] . " " . $row['lname'];
                      array_push($author, strtoupper($fullname));
                    }
                  }


                  ?>
                Author:</br>
                  <textarea rows="4" cols="102" placeholder="author" name="author" id="author" 
						style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold; resize: none;" readonly><?php 
            foreach($author as $key){
              echo $key . "\n";
            } ?></textarea>
                </p>
                <p class="edittxt">

								Status:<br/> 
								<select name="status" id="status" style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;">
                  <option></option>
									<option> Unpublish </option>
									<option> Proposed </option>
									<option> Completed </option>
									<option> Disseminated/Presented </option>
									<option> Published </option>
								</select>

                <fieldset class= "fieldset-disseminated" style= "width: 97%; display: none;">
                  <legend><i> Choose Disseminated/Presented Option </i></legend>
                  <br/>
                  <form id="dis-form">
                    <input type="text" name="book_id" value="<?php echo $_GET['book_id']; ?>" style="display: none;">
                  Type:<br>
					         <select style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; id="dis-type" name="dis-type">
					             <option class="tbl-radiocontainer" id="institutional" style="font-size: 12pt"> Institutional </option>
  	           	  			<option class="tbl-radiocontainer" id="national" style="font-size: 12pt"> National </option>
					             <option class="tbl-radiocontainer" id="international" style="font-size: 12pt"> International </option>
                    </select>
                    <br>
                    <br>
					
                    <!--<input type="radio" name="loc" id="btn-radio-institutional" value="Institutional" class="btn-radio">
                    <label class="tbl-radiocontainer" id="institutional" style="font-size: 12pt"> Institutional 
                      <span class="tbl-radiocheckmark"></span>
                    </label>
					
					<input type="radio" name="loc" id="btn-radio-national" value="National" class="btn-radio">
                    <label class="tbl-radiocontainer" id="national" style="font-size: 12pt"> National 
                      <span class="tbl-radiocheckmark"></span>
                    </label>
          
                    <input type="radio" name="loc" id="btn-radio-intl" value="International" class="btn-radio">
                    <label class="tbl-radiocontainer" id="international" style="font-size: 12pt"> International 
                      <span class="tbl-radiocheckmark"></span>
                    </label>
                    <textarea rows="4" cols="102" placeholder="Description 160 Character maximum" name="disseminated-desc" id="disseminated-desc" 
            style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold; resize: none;"></textarea> -->
					Name of Conference: 
                    <input type="text" placeholder="conference name" id="dis-con" name="dis-con" 
					style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;">
					         <br>
                    <br>
					Venue of Conference: 
                    <input type="text" placeholder="conference venue" id="con-ven" name="con-ven" 
					style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;">
					         <br>
                    <br>
					Date:<br>
                    <input type="date" width="100%" name="disdate" id="disdate" placeholder="" 
					style= "font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;">
					         
                   <br>
                    <br>
					Certificates if Available: 
          <br>
					<input type="file" name="myFile[]" id="dis-cert" 
					style= "font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;" multiple>
					</form>
                </fieldset> 
                <input type="text" id="book_id" name="book_id" value="<?php echo $_GET['book_id']; ?>" style="display: none;">
                <fieldset class= "fieldset-published" style= "width: 97%; display: none;">
                  <legend><i> Fill Published Details</i></legend> 
                  <form id="form-published">
                    ISSN:&emsp; 
                    <input type="text/number" placeholder="serial number" id="isdn" name="serial" style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;"></br></br>
                    
                    Name of Journal: 
                    <input type="text" placeholder="journal name" id="journal" name="journal" 
					style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;"> 
					
					Type of Journal: 
                    <input type="text" placeholder="journal type" name="type" id="type"
					style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;"> 
                
					Date:
                    <input type="date" width="100%" name="pubdate" id="pubdate" placeholder="" 
					style= "font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;">
        </form>
					
				</fieldset> 
                <p class="edittxt" style= "font-family: Century Gothic; font-size: 16px">
				Cited:<br>
                  <input type="number" placeholder="cite" name="cite" id="cite" min="0"
				  style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;" value="<?php echo $_GET['cited']; ?>">
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
  <script src="js/jquery.form.min.js"></script>


    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>
    <script type="text/javascript" src="js/editdocu.js"></script>

  </body>
</html>
