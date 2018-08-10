<?php

//session_start();
$bookid = 1;

?>


<!DOCTYPE html>
<!-- ANNE -->
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>Author - BUKSU RRMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/groupdoclist.css">
</head>
<body id="annegroupbody">
   <?php
        include_once 'header.php';
     ?>
   <?php
   $bookid = $_GET['book_id'];
 ?>
   <div class="annegroup">
    <?php
          include_once 'connection.php';
          $dbconfig = new dbconfig();
          $con = $dbconfig->getCon();
          $query = "SELECT * FROM `account` WHERE id = $bookid";
          $result = $con->query($query);
           if ($result->num_rows>0) {
            while ($row=$result->fetch_assoc()) {
              #echo $row['a_id'] . " " . $row['a_fname'] . " " . $row['a_mname'] . " " . $row['a_lname'] . " " . $row['a_suffix'] . " " . $row['a_add'] . " " . $row['a_contact'] . " " . $row['a_email'];
      ?>
      <h2><?php echo $row['g_name']; ?></h2> <!--voidmain -->
     <?php }
  } ?>
  </div>
        <!--  <div class="annegroupbook"> -->

            <table class="subtable" style="width:100%;">
              <tr>
                <td style="width:50%; text-align:left;"> <h3> SUBMITTED RESEARCH PAPER </h3> </td>
          <td style="text-align: right;">    <a href="add-research.php"> <h5 class="subdocu"> Submit documents </h5> </a> </td>
              </tr>
              </table>
                <hr>
      <!--    </div> -->
             <div class="annegrouplist">



                     <table class="grouptable" style="width:100%;">

                       <tr>
                           <td class="bookchar">  <a  href="bookdetails.php?book_id=1">TITLE</a> </td>
                             <td class="subrevision" style="text-align:right;"> <a href="revision.php">Submit Revisions</a> </td>
                      </tr>
                      </table>





                  </div>
 </body>
 <footer style="padding-top: 5px;">
   <?php include_once 'footer.php' ?>

 </footer>
</html>
