<!doctype hthml>

<html>

  <head>
    <meta charset="utf-8">
    <title>IMAGE DETAILS</title>
    <link rel="stylesheet" type="text/css" href="imagedetails.css">

  </head>

      <body>
        <!--start of php -->
        <?php
        include_once 'connection.php';
        $dbconfig = new dbconfig();
        $conn = $dbconfig->getCon();
        $id = $_GET['book_id'];
        $query = "select * from book where book_id = $id";
        $result = $conn->query($query);
        if($result-> num_rows > 0){
          while ($row = $result->fetch_assoc()) {

         ?>

          <div class="box">
            <div class="imgBx">
              <img src="<?php echo $row['cover']; ?>"height="250px">
              <div class="abstract">
                <strong><p><br/>Abstract:</p></strong>
                <p><?php echo $row['abstract'];?>.</p>
              </div>
              <div class="reference">
                  <strong><p>references:</p></strong>
                  <p><a href="www.pornhub.com">https://www.youjazz.com</a></p>
                    <p><a href="www.pornhub.com">https://www.cornhub.com</a></p>
              </div>
            </div>
            <div class="content">
              <div class="title">
              <h2><?php echo $row['book_title']; ?></h2>
            </div>
            <div class="author">
              Author: ssxxwq ddcc
            </div>
            <div class="pubdate">
              Date of publication: 07/09/2018
            </div>
            <div class="keywords">
                <strong><p>Keywords: </p></strong>
                internet, fdsf,eewf,feff,feewf
            </div>
            <div class="viewscount">
              <strong><p>Views:<?php echo " " .  $row['views_count']; ?> </p></strong>

            </div>



          <?php }
      }?>
      <!--end of php -->






            </div>
          </div>
      </body>


</html>
