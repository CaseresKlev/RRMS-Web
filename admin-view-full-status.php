<?php

  session_start();
  $book_id ="";
  $book_title = "";
  $trail_id = "";
  $origin = "";
  if(isset($_SESSION['uid']) && isset($_GET['book_id']) && $_GET['trail']){
    $book_id = $_GET['book_id'];
    $trail_id = $_GET['trail'];
    //echo $trail_id;
  }else{
    header("Location: admindashboard.php");
  }

  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];
  if($acctype==="admin"){
    //echo "Admin ANG NAKALOGIN";
  }else if($acctype==="INSTRUCTOR"){
    //echo "Instructor ang naka login";

    header("Location: instructordashboard.php");
  }else if($acctype==="student"){
    header("Location: index.php");
  }

  include_once 'connection.php';
  $dbconfig = new dbconfig();
  $conn = $dbconfig->getCon();
  $query = "SELECT book_id, book_title, cited, enabled FROM `book` WHERE book_id=" .$book_id;
  $result = $conn->query($query);
  if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $book_title = $row['book_title'];
  }

  $conn = $dbconfig->getCon();
  $query = "SELECT `origin` FROM `comments` WHERE `trail_id` = $trail_id";
  $result = $conn->query($query);
  if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $origin = $row['origin'];
    //echo $origin;
  }



  $dbconfig = new dbconfig();
  $conn = $dbconfig->getCon();
  $query = "SELECT paper_trail.p_sat_id, paper_trail.file_loc, paper_trail.requirements, paper_trail.isdone, paper_stat.hasrequired FROM paper_trail INNER JOIN paper_stat on paper_trail.p_sat_id = paper_stat.id WHERE paper_trail.id = $trail_id";
  $fileLoc = "";
  $required = "";
 
   $result = $conn ->query($query);
   if($result->num_rows>0){
      $row0 = $result->fetch_assoc();
      $fileLoc = $row0['file_loc'];
      $required = $row0['hasrequired'];
      
   }

   $str = explode("/", $fileLoc);

  ?>




<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Administrator </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/temp.css">
    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom.min.css">

</head>

<body class="nav-md" >
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
					<ul><a class= "dashboard-active" href="admindashboard.php"> RESEARCH </span></a></ul>
					<ul><a href="updateAcc.php"> UPDATE ACCOUNT </a></ul>
					<ul><a href="accesscode.php"> ACCESS CODE </a> </ul>
                        <?php
                            $d = Date('Y-m-d');
                            $yr = explode("-", $d);


                            echo '<ul><a href="book_reports.php?title=&dept=&status=&author=&from=0&to=' . $yr[0] . '" target="_blank"> REPORTS </a> </ul>';
                          ?>

          <ul><a href="dept.php">DEPARTMENT </a> </ul> </br>
					<ul><a href="index.php"> Back to Home </a> </ul>

                </div>
              </div>

            </div>
          </div>
        </div>


        <?php
          $paper_stat = "";
          $date = "";
          $desc = "";
          //$trail_id = "";
          //$origin = "";
          include_once 'connection.php';
          $dbconfig = new dbconfig();
          $conn = $dbconfig->getCon();
          $query = "SELECT paper_trail.id, book.book_title, paper_stat.title, paper_stat.Description, isdone, date FROM paper_trail INNER JOIN book on book.book_id = paper_trail.book_id INNER JOIN paper_stat on paper_stat.id = paper_trail.p_sat_id WHERE paper_trail.id = " . $trail_id;
          //echo $query;

          $result = $conn ->query($query);
          if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $paper_stat = $row['title'];
            $date = $row['date'];
            $desc = $row['Description'];
            $trail_id = $row['id'];
            //$origin = $row['origin'];
          }
          
        ?>



        <!-- page content -->
        <div class="right_col" role="main" style= "min-height: 712px;">
			<div id= "admin-frm-search" class= "frm-search" style= "font-size: 18px">
        <div class="container">
          <div class="row">
            <div class="col-md-12" style="font-size: 22pt"><b><i> <?php echo $book_title ?></i> </b></div>
            <div class="col-md-12" ><b style="color: gray"> gggg </b></div>
          </div>
          <br>
          <br>
          

				<!-- -->

        <div id= "instructor-div-voidmain" class= "div-voidmain">
          <div class="container">
            <div class="row">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" colspan="3"><h3><?php 
                    //$date =  date('l d F Y');
                    $long = strtotime($date);
                    $date = date('F d, Y', $long);
                    $time = date('h:i:s a', $long);

                    echo 'Paper status: <em style="font-size: 18pt; font-weight: bold">' . $paper_stat . '</em>' ?></h3></th>
                    
                    
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td scope="col" style="width: 15%">Date</td>
                    <td scope="col" style="width: 85%"><?php echo $date . " at " . $time ?></td>
                  </tr>
                  <tr>
                    
                    <td scope="col">Description</td>
                    <td scope="col"><?php echo($desc)?></td>
                  </tr>
                  
                  <?php

                    
                  ?>

                  
                  
                </tbody>
                <th></th>
              </table>
              <br>
              <?php
                if($required!==""){

                  if($required==="paper"){
                    if($fileLoc===""){
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Revision <em style="color: red">*Required</em>
                      </div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                      <div class="col-md-12">
                        <em style="color: red">Author not yet uploaded a revision copy of this research.</em>
                      </div>
                      
                    </div>
                  </div><br><br>';
                }else{
                  echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Revision
                      </div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;">
                        <table class="table">
                          <thead>
                            <tr">
                              <td scope="col" style="width: 100%">Revision 1: <a href="'. $fileLoc .'"><em>'. $str[1] .'</em></a></td>
                              
                            </tr>
                          </thead>
                        </table>
                      </div>
                      
                    </div>
                  </div><br><br>';
                }
                       
                  }elseif ($required==="pub") {
                    $con= $dbconfig -> getCon();
                    $query= "SELECT published.id, published.history, book.book_title, published.issn, published.journal, published.type, published.date FROM published INNER JOIN book ON book.book_id = published.book_id WHERE published.book_id = $book_id";
                    $result = $con -> query($query);
                    $counter = 0;



                    if($result->num_rows>0){

                      $con= $dbconfig -> getCon();
                    $query= "UPDATE `paper_trail` SET `requirements` = '1' WHERE `paper_trail`.`id` = $trail_id";
                    $result2 = $con -> query($query);

                      echo '<p id="status" style="display: none;">Published</p>';
                      echo '<p id="book_id" style="display: none;">' . $book_id . '</p>';
                      echo '<p id="trail_id" style="display: none;">' . $trail_id   . '</p>';
                      
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-6" style="font-size: 18pt; font-weight: bold;">
                        Paper Publication Information
                      </div>
                      <div class="col-md-6"><button class="btn btn-primary" style="float: right;" id="btn-add-new-pub" data-toggle="modal" data-target="#modaladdpub">Add new Publication</button></div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                      <br><br>
                      <div class="col-md-12" >
                        <table class="table">
                          <thead style="font-size: 14pt; font-weight: bold">
                            <tr">
                              
                              <td scope="col">ISSN</td>
                              <td scope="col">Journal</td>
                              <td scope="col">Journal Type</td>
                              <td scope="col">Date</td>
                              <td scope="col" colspan="2">Action</td>
                            </tr>
                          </thead><tbody>';
                      while($rowpub =$result->fetch_assoc()){
                        echo '<tr>
                              
                              <td scope="col" id="issn-'. $counter .'">'. $rowpub['issn'] .'</td>
                              <td scope="col" id="journal-'. $counter .'">'. $rowpub['journal'] .'</td>
                              <td scope="col" id="type-'. $counter .'">'. $rowpub['type'] .'</td>
                              <td scope="col" id="date-'. $counter .'">'. $rowpub['date'] .'</td>
                              <td scope="col"><button class="btn btn-warning" id="btn-pub-edit[]" data-toggle="modal" data-target="#modaladdpub" name="'. $rowpub['id'] .'-'. $counter .'">Edit</button></td>
                              <td scope="col"><button class="btn btn-danger" id="btn-pub-delete[]" name="'. $rowpub['id'] .'-'. $counter .'-'. $rowpub['history'] .'">Delete</button></td>
                            </tr>';
                            $counter++;
                      }
                      echo '</tbody></table>
                      </div>
                      
                    </div>
                  </div>
              <br>';

                    }else{
                      $con= $dbconfig -> getCon();
                    $query= "UPDATE `paper_trail` SET `requirements` = '0' WHERE `paper_trail`.`id` = $trail_id";
                    $result2 = $con -> query($query);
                      echo '<p id="status" style="display: none;">Published</p>';
                      echo '<p id="book_id" style="display: none;">' . $book_id . '</p>';
                      echo '<p id="trail_id" style="display: none;">' . $trail_id   . '</p>';
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-6" style="font-size: 18pt; font-weight: bold;">
                        Paper Publication Information <em style="color: red">*Required</em>
                      </div>
                      <div class="col-md-6"><button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modaladdpub">Add new Publication</button></div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                        <br>
                        <br>
                        <div class="col-md-12"><em style="color: red;">Please click the \'Add new Publication\' button to provide Publication information.</em></div>
          
                    </div>
                    
                  </div><br>';
                    }
                    
                  }elseif ($required==="dis"){
                    echo '<p id="status" style="display:none">Disseminated / Presented</p>';
                    //echo "string";
                    $con= $dbconfig -> getCon();
                    $query= "SELECT disseminated.id, book.book_title, disseminated.type, disseminated.convension, disseminated.location, disseminated.date FROM `disseminated` inner JOIN book on disseminated.book_id = book.book_id WHERE disseminated.book_id = $book_id";
                    $result = $con -> query($query);

                     if($result->num_rows>0){
                       $con= $dbconfig -> getCon();
                      $query= "UPDATE `paper_trail` SET `requirements` = '1' WHERE `paper_trail`.`id` = $trail_id";
                      $result2 = $con -> query($query);
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-10" style="font-size: 18pt; font-weight: bold;">
                        Paper Dissemination Information
                      </div>
                      <div class="col-md-2"><button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modaldis">Add new Dissemination</button></div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;">
                        <table class="table">
                          <thead style="font-size: 14pt; font-weight: bold">
                            <tr">
                              <td scope="col">Research Tittle</td>
                              <td scope="col">Dissemination Type</td>
                              <td scope="col">Convention</td>
                              <td scope="col">Location</td>
                              <td scope="col">Date</td>
                              <td scope="col" colspan="2">Action</td>
                            </tr>
                          </thead><tbody>';
                          $counter=0;
                          while ($rowdis= $result->fetch_assoc()) {
                            echo '   <td scope="col">'. $rowdis['book_title'] .'</td>
                              <td scope="col" id="dis-type-td-'. $counter .'">'. $rowdis['type'] .'</td>
                              <td scope="col" id="dis-conven-td-'. $counter .'">'. $rowdis['convension'] .'</td>
                              <td scope="col" id="dis-loc-td-'. $counter .'">'. $rowdis['location'] .'</td>
                              <td scope="col" id="dis-date-td-'. $counter .'">'. $rowdis['date'] .'</td>
                              <td><button class="btn btn-warning btn-sm" id="btn-dis-edit[]" data-toggle="modal" data-target="#modaldis"  name="'. $rowdis['id'] .'-'. $counter .'">Edit</button>
                              <td><button class="btn btn-danger btn-sm" id="btn-dis-del[]" name="'. $rowdis['id'] .'">Delete</button>
                            </tr>';
                          }
                          $counter++;
                          echo '</tbody></table>
                      </div>
                      
                    </div>
                  </div><br><br><br><br>
              <br>';
                  }else{
                    echo '<p id="status" style="display:none">Disseminated / Presented</p>';
                    $con= $dbconfig -> getCon();
                    $query= "UPDATE `paper_trail` SET `requirements` = '0' WHERE `paper_trail`.`id` = $trail_id";
                    $result2 = $con -> query($query);
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-10" style="font-size: 18pt; font-weight: bold;">
                        Paper Dissemination Information <em style="color: red">*Required</em>
                      </div>
                      <div class="col-md-2"><button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modaldis">Add new Dissemination</button></div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                        <br>
                        <br>
                        <div class="col-md-12"><em style="color: red;">Please click the \'Add new Dissemination\' button to provide dissemination information.</em></div>
          
                    </div>
                    
                  </div><br>';
                  }
                  
                  $con= $dbconfig -> getCon();
                  $query= "SELECT `documents`, `orig_name` FROM `documents` WHERE `book_id` = $book_id";
                  $result2 = $con -> query($query);
                  if($result2->num_rows>0){
                    echo '<br><br><div class="row">
                      <div class="col-md-10" style="font-size: 18pt; font-weight: bold;">
                       Files and Certificates
                      </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                        <br>
                        <br>
                        <div class="col-md-12">
                          <em style="color: red;">
                              <ul>';
                    while ($row=$result2->fetch_assoc()) {
                      echo '<li><a href="'. $row['documents'] .'">'. $row['orig_name'] .'</a></li>';
                    }
                    echo '</ul>
                          </em>
                        </div>
          
                    </div>
                    
                  </div><br>';
                  }



                }elseif($required==="util"){

                  $con= $dbconfig -> getCon();
                  $query= "SELECT book.book_title, `id`,`orgname`, `orgaddress`, `date`, `history` FROM `utilize` INNER JOIN book on book.book_id = utilize.book_id WHERE utilize.book_id = $book_id";
                  $result2 = $con -> query($query);

                  echo '<p id="util_book_id" style="display: none;">' . $book_id . '</p>';
                  echo '<p id="util_trail_id" style="display: none;>' . $trail_id . '</p>';
                  if($result2->num_rows>0){
                      $con= $dbconfig -> getCon();
                      $query= "UPDATE `paper_trail` SET `requirements` = '1' WHERE `paper_trail`.`id` = $trail_id";
                      $result3 = $con -> query($query);
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-10" style="font-size: 18pt; font-weight: bold;">
                        Paper Dissemination Information
                      </div>
                      <div class="col-md-2"><button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modalutil" id="btn-util-addnew">Add new Utilization</button></div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;">
                        <table class="table">
                          <thead style="font-size: 14pt; font-weight: bold">
                            <tr">
                              <td scope="col">Research Tittle</td>
                              <td scope="col">Organization</td>
                              <td scope="col">Address</td>
                              <td scope="col">Date</td>
                              <td scope="col" colspan="2">Action</td>
                            </tr>
                          </thead><tbody>';
                          $counter=0;
                          while ($rowdis= $result2->fetch_assoc()) {
                            echo '   <td scope="col">'. $rowdis['book_title'] .'</td>
                              <td scope="col" id="util-orgname-td-'. $counter .'">'. $rowdis['orgname'] .'</td>
                              <td scope="col" id="util-orgadd-td-'. $counter .'">'. $rowdis['orgaddress'] .'</td>
                              <td scope="col" id="util-date-td-'. $counter .'">'. $rowdis['date'] .'</td>
                              <td><button class="btn btn-warning btn-sm" id="btn-util-edit[]" data-toggle="modal" data-target="#modalutil"  name="'. $rowdis['id'] .'-'. $counter .'">Edit</button>
                              <td><button class="btn btn-danger btn-sm" id="btn-util-del[]" name="'. $rowdis['id'] .'">Delete</button>
                            </tr>';
                            $counter++;
                          }
                          
                          echo '</tbody></table>
                      </div>
                      
                    </div>
                  </div><br><br><br><br>
              <br>';


                  }else{
                    $con= $dbconfig -> getCon();
                      $query= "UPDATE `paper_trail` SET `requirements` = '0' WHERE `paper_trail`.`id` = $trail_id";
                      $result2 = $con -> query($query);
                    echo '<div class="container">
                    <div class="row">
                      <div class="col-md-10" style="font-size: 18pt; font-weight: bold;">
                        Paper Utilization Information <em style="color: red">*Required</em>
                      </div>
                      <div class="col-md-2"><button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modalutil">Add new Utilization</button></div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                        <br>
                        <br>
                        <div class="col-md-12"><em style="color: red;">Please click the \'Add new Utilization\' button to provide utilization information.</em></div>
          
                    </div>
                    
                  </div><br>';
                  }

                  $con= $dbconfig -> getCon();
                  $query= "SELECT `documents`, `orig_name` FROM `documents` WHERE `book_id` = $book_id";
                  $result2 = $con -> query($query);
                  if($result2->num_rows>0){
                    echo '<br><br><div class="row">
                      <div class="col-md-10" style="font-size: 18pt; font-weight: bold;">
                       Files and Certificates
                      </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                        <br>
                        <br>
                        <div class="col-md-12">
                          <em style="color: red;">
                              <ul>';
                    while ($row=$result2->fetch_assoc()) {
                      echo '<li><a href="'. $row['documents'] .'">'. $row['orig_name'] .'</a></li>';
                    }
                    echo '</ul>
                          </em>
                        </div>
          
                    </div>
                    
                  </div><br>';
                  }
                  
                  
                }


                }

              ?>
                    
                                
                              
              <br>
              <br>
              <div class="container">
                <div class="row">
                  <div class="col-md-7" style="font-size: 18pt; font-weight: bold;">Summary of Comments and Suggestion</div>
                </div>
                <hr>
                <div class="row" style="">
                  <div class="col-md-6" style="font-size: 16pt; font-weight: bold;">
                    Originator: <em><?php if($origin===""){echo "Not Available";}else{echo $origin; } ?></em>
                  </div>
                  <div class="col-md-6" style="margin-bottom: 5px">
                    <button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modaladdnew"> Add new comments</button>
                  </div>
                  <div  class="container">
                    
                  </div>
                
              </div>
                <table class="table" style="border: 1px solid black; border-collapse: collapse;">
                    
                    <tbody>
                      <?php
                      $dbconfig= new dbconfig();
                      $con= $dbconfig -> getCon();
                      $query= "SELECT * FROM `comments` WHERE `trail_id` = $trail_id";
                      $result = $con -> query($query);
                      if($result->num_rows>0){
                        echo '<thead>
                      <tr>
                        <td scope="col" style="width: 30%; border: 1px solid black; border-collapse: collapse;" ><b>Parts of Manuscript</b></td>
                        <td scope="col" style="width: 50%; border: 1px solid black; border-collapse: collapse;"><b>Comments / Suggestion</b></td>
                        <td scope="col" style="width: 15%; border: 1px solid black; border-collapse: collapse;"><b>Page</b></td>
                        <td scope="col" style="width: 5%; border: 1px solid black; border-collapse: collapse;" colspan="3"><b>Action</b></td>
                        
                        </tr>
                    </thead><tbody>';
                        while ($rowCom = $result->fetch_assoc()) {
                          
                          echo '<tr><td scope="col" style=" border: 1px solid black; border-collapse: collapse;"><i id="parts-i-'.  $rowCom['id'] .'">'. $rowCom['parts'] .'</i><textarea style="background: transparent; font-size: 12pt; display:none; height:auto;" class="form-control" rows="1" readonly id="parts-'. $rowCom['id'] .'">'. $rowCom['parts'] .'</textarea></td>
                      <td scope="col" style=" border: 1px solid black; border-collapse: collapse;"><i id="comments-i-'. $rowCom['id'] .'">'. $rowCom['comments'] .'</i><textarea style="background: transparent; font-size: 12pt; display:none; height: auto;" id="comments-'. $rowCom['id'] .'"class="form-control" rows="1" readonly>'. $rowCom['comments'] .'</textarea></td>
                      <td scope="col" style=" border: 1px solid black; border-collapse: collapse;"><i id="pageno-i-'. $rowCom['id'] .'">'. $rowCom['page'] .'</i> <input class="form-control input-md"  style="display:none" id="pageno-'. $rowCom['id'] .'" type="text" style="font-weight: bold; pattern="[0-9-]{3}" name="'. $book_id .'"readonly value="'. $rowCom['page'] .'"></td>
                      <td scope="col" style="width: 5%; border: 1px solid black; border-collapse: collapse;"><button class="btn btn-warning btn-md" id="page-edit[]" name="'. $rowCom['id'] .'">Edit</button></td>
                      <td scope="col" style="width: 5%; border: 1px solid black; border-collapse: collapse;"><button class="btn btn-danger btn-md" id="page-delete[]" name="'. $rowCom['id'] .'">Delete</button></td>
                      <td scope="col" style="width: 5%; border: 1px solid black; border-collapse: collapse;"><button class="btn btn-primary btn-md" id="page-cancel[]" name="'. $rowCom['id'] .'">Cancel</button></td>
                      
               
                      <tr>';
                        }
                        echo "</tbody>";
                      }else{
                        echo '<thead>
                      <tr>
                        <td scope="col" style="width: 100%; border: 1px solid black; border-collapse: collapse;" ><center>No Comments yet.</center></td>
                        </tr>
                    </thead>';
                      }
                    ?>
                      
                    </tbody>
                   
                </table>
                <br>
                <br>
                <br>
                
            </div>
            <!--addnew  modal-->
                <div class="modal fade" id="modaladdnew" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" id="modal-title">Add new Comments / Suggestions</h4>
                        </div>
                        <div class="modal-body">
                          <form action="/action_page.php">
                            <div class="container">
                              <div class="form-group">
                                <label for="origin">Originator:</label>
                                
                                    <?php 
                                      $dbconfig= new dbconfig();
                                      $con= $dbconfig -> getCon();
                                      $query= "SELECT * FROM `comments` WHERE `trail_id` = $trail_id";
                                      $result = $con -> query($query);  

                                        if($result->num_rows>0){
                                          $row = $result->fetch_assoc();
                                          echo '<select class="form-control" id="origin" style=" height: auto;line-height: 14px;">
                                        <option>'. $row['origin'] .'</option>
                                    </select>';
                                        }else{
                                          echo '<select class="form-control" id="origin" style=" height: auto;line-height: 14px;">
                                        <option>Research Committee</option>
                                        <option>Internal Reviewers</option>
                                        <option>Panel of Experts</option>
                                        <option>Research Ethics Committee</option>
                                    </select>';
                                        }
                                    ?>
                                
                              </div>
                              <div class="form-group">
                                <label for="parts-man">Parts of Manuscript:</label>
                                <textarea class="form-control" rows="2" id="parts-man"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="comments">Comments / Suggestions:</label>
                                <textarea class="form-control" rows="2" id="comments"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="page-num">Page:</label>
                                <input type="text" class="form-control" id="page-num">
                              </div>
                             
                            
                            </div>

                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-success" id="btn-save" <?php echo ' name="' . $trail_id . '"';?> >Save Comments</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
            
          </div>
                
                <!--Publication modal-->
                <div class="modal fade" id="modaladdpub" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" id="modal-title-pub">Add new publication information</h4>
                        </div>
                        <div class="modal-body">
                          <form id="form-published">
                            <div class="form-group">
                              <label for="isdn">ISSN: <em style="color: red">*</em></label>
                              <input type="text/number" placeholder="serial number" id="isdn" name="serial"  class="form-control" style= "font-family: Century Gothic; font-size: 13pt;  font-weight: bold;">
                            </div>
                            <div class="form-group">
                              <label for="journal"> Name of Journal: <em style="color: red">*</em></label>
                              <input type="text" placeholder="journal name" id="journal" name="journal" class="form-control" 
                                    style= "font-family: Century Gothic; font-size: 13pt;  font-weight: bold;">
                            </div>
                            <div class="form-group">
                              <label for="type">Type of Journal: <em style="color: red">*</em></label>
                               <input type="text" placeholder="journal type" name="type" id="type" class="form-control" 
                                  style= "font-family: Century Gothic; font-size: 13pt;  font-weight: bold;">
                            </div>
                            <div class="form-group">
                              <label for="pubdate">Date: <em style="color: red">*</em></label>
                              <input type="date" width="100%" name="pubdate" id="pubdate" placeholder="" class="form-control" 
                                style= "font-family: Century Gothic; font-size: 13pt;  font-weight: bold;">
                            </div>
                            
                                        
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" id= "instructor-btn-pub-save" class="btn btn-success" style="float: right"> SAVE </button>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <!--dissemination modal-->
                  <div class="modal fade" id="modaldis" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" id="modal-title-dis">Add new dissemination information</h4>
                        </div>
                        <div class="modal-body">
                          <form id="dis-form">
                            <div class="form-group">
                              <input type="text" name="book_id" value="<?php echo $_GET['book_id']; ?>" style="display: none;">
                            </div>
                            <div class="form-group">
                              <label for="dis-type">Type: <em style="color: red">*</em></label>
                              <select style= "font-size: 13pt;  font-weight: bold"; id="dis-type" name="dis-type" class="form-control">
                               <option class="tbl-radiocontainer" id="institutional" style="font-size: 12pt"> Institutional </option>
                                <option class="tbl-radiocontainer" id="national" style="font-size: 12pt"> National </option>
                               <option class="tbl-radiocontainer" id="international" style="font-size: 12pt"> International </option>
                            </select>
                            </div>
                            <div class="form-group">
                              <label for="dis-con"> Name of Conference: <em style="color: red">*</em></label>
                              <input type="text" placeholder="Conference name" id="dis-con" name="dis-con"
                                  style= "font-size: 15px; font-weight: bold;" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="con-ven">Venue of Conference: <em style="color: red">*</em></label>
                               <input type="text" placeholder="Conference venue" id="con-ven" name="con-ven" class="form-control" 
                                    style= " font-size: 15px; font-weight: bold;">
                            </div>
                            <div class="form-group">
                              <label for="disdate"> Date: <em style="color: red">*</em></label>
                              <input type="date" width="100%" name="disdate" id="disdate"  class="form-control" 
                                style= " font-size: 15px;  font-weight: bold;">
                            </div>
                            <div class="form-group">
                              <label for="dis-cert">Certificates if Available: <em style="color: red">*</em></label>
                              <input type="file" name="myFile[]" id="dis-cert" class="form-control" 
                                style= "font-size: 15px; font-weight: bold;" multiple>
                            </div>
                            
                                        
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" id="instructor-btn-dis-save" class="btn btn-success" style="float: right">SAVE</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                  <!--dissemination modal-->
                  <div class="modal fade" id="modalutil" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" id="modal-title-util">Add new utilization information</h4>
                        </div>
                        <div class="modal-body">
                          <form id="util-form">
                            <div class="form-group">
                              <input type="text" name="util-book_id" id="util-book_id" value="<?php echo $_GET['book_id']; ?>" style="display: none;">
                              <input type="text" name="util-trail_id" id="util-trail_id" value="<?php echo $_GET['trail']; ?>" style="display: none;">
                            </div>
                            <div class="form-group">
                              <label for="org-name">Organization: <em style="color: red">*</em></label>
                              <input type="text" name="org-name" id="org-name" class="form-control" style= "font-size: 15px; font-weight: bold;" placeholder="Oranization name" >
                            </select>
                            </div>
                            <div class="form-group">
                              <label for="util-ad">Address: <em style="color: red">*</em></label>
                              <input type="text" placeholder="Address" id="util-ad" name="util-ad"
                                  style= "font-size: 15px; font-weight: bold;" class="form-control">
                            </div>
                            
                            <div class="form-group">
                              <label for="utildate"> Date: <em style="color: red">*</em></label>
                              <input type="date" width="100%" name="util-date" id="util-date"  class="form-control" 
                                style= " font-size: 15px;  font-weight: bold;">
                            </div>
                            <div class="form-group">
                              <label for="dis-cert">Certificates if Available: <em style="color: red">*</em></label>
                              <input type="file" name="myFile[]" id="dis-cert" class="form-control" 
                                style= "font-size: 15px; font-weight: bold;" multiple>
                            </div>
                            
                                        
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" id="instructor-btn-util-save" class="btn btn-success" style="float: right">SAVE</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>


        

       </div>

          <!-- top tiles -->
          <div class="row tile_count"></div>









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


    <!-- Custom Theme Scripts -->
      <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script src="js/custom.min.js"></script>
      <script src="js/jquery.form.min.js"></script>

      <script src="js/searchdoc.js"></script>
      <script type="text/javascript" src="js/editdocu.js"></script>
  </body>
</html>
s