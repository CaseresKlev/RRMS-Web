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
                <td style="width:50%; text-align:left; font-family: helvetica"> <h3> RESEARCH TITLE </h3>
					<h4 style="text-align:left; font-family: helvetica"> AUTHORS: </h4>
				</td>
            </tr>
			<tr>
                <td style="text-align:left; font-family: helvetica">   
					<li style= "margin-left: 2%"> Gonzales, Loyd </li>
				</td>
            </tr>
        </table>
		</br>
        <table class="subtable" style="width:100%;">
            <tr>
                <td style="width:50%; text-align:left; font-family: helvetica"> <h3> RESEARCH HISTORY </h3> </td>
            </tr>
        </table>
                <hr>
      <!--    </div> -->
             <div class="annegrouplist">



                    <table class="grouptable" style="width:100%; margin-left: 2%">
						<tr>
							<td style="width:50%; text-align:left; font-family: helvetica"> 
								<li style= "text-align:left; font-family: helvetica"><span> UNPUBLISHED </br> 08/18/18 </span></li>
							</td>
						</tr>
						<tr> 
							<td style="width:50%; text-align:left; font-family: helvetica"> </br>
								<li style= "text-align:left; font-family: helvetica"> PUBLISHED ON </br> 08/18/18 
								</br> JOURNAL  NAME: </br> ISSN: </br> LOCATION: 
								</li>
							</td>
						</tr>
						<tr>
							<td style="width:50%; text-align:left; font-family: helvetica"> </br>
								<li style= "text-align:left; font-family: helvetica"> DISSEMINATED </br> TYPE: Local</br> 08/18/18 
								</br> LOCATION: 
								</li>
							</td>
						</tr>
                    </table>
                      <br/>
                      



                  </div>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <hr>
 </body>
 <footer style="padding-top: 5px;">
   <?php include_once 'footer.php' ?>

 </footer>
</html>
