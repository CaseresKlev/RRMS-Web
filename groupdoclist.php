<?php

//session_start();
$bookid = 1;
$accid = $_GET['gid'];
//echo $gid;

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
  
 ?>
   <div class="annegroup">
    
  </div>
        <!--  <div class="annegroupbook"> -->

            <table class="subtable" style="width:100%;">
              <tr>
                <td style="width:50%; text-align:left;"> <h3> SUBMITTED RESEARCH PAPER </h3> </td>
                <?php 
                  include_once 'connection.php';
                  $dbconfig = new dbconfig();
                  $conn = $dbconfig->getCon();
                  $query = "SELECT book.book_id, book.book_title as 'title' from book INNER JOIN groupdoc on book.book_id = groupdoc.book_id WHERE groupdoc.accid = $accid";
                  $result = $conn->query($query);
                  $hideResult = null;
                  $row = null;
                  if(!$result->num_rows>0){
                    
                    //echo "string " . $row['book_id'];
                    $hideResult = true;
                    echo "<td style=" . "\"text-align: right;\"" .">    <a href="."\"add-research.php". "\"". "> <h5 class=". "\"subdocu"."\"" . "> Submit documents </h5> </a> </td>";
                  }else{
                      $row = $result->fetch_assoc();
                  }
                //echo $query;        

                ?>
          
              </tr>
              </table>
                <hr>
      <!--    </div> -->
             <div class="annegrouplist">



                     <table class="grouptable" style="width:100%;">
                      <?php 

                      if(!$hideResult){
                        echo "<tr><td class="."\"bookchar\"" . ">  <a  href=" . "\"bookdetails.php?book_id=" . $row['book_id'] . "\"" . ">". $row['title'] . "</a> </td><td class=". "\"subrevision\"" . " style=". "\"text-align:right;" ."\"" . "> <a href=". "\"revision.php?book_id=" . $row['book_id']. "&revison=true" . "\"" . ">Submit Revisions</a> </td>
                      </tr>";
                      }


                      ?>
                       
                      </table>





                  </div>
 </body>
 <footer style="padding-top: 5px;">
   <?php include_once 'footer.php' ?>

 </footer>
</html>
