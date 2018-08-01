<!doctype hthml>

<html>

  <head>
    <meta charset="utf-8">
    <title>IMAGE DETAILS</title>
    <link rel="stylesheet" type="text/css" href="imagedetails.css">
<<<<<<< HEAD
=======

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
              <div class="viewscount">
                <strong><p>Views:<?php echo " " .  $row['views_count']; ?> </p></strong>

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
            <div class="abstract">
              <strong><p>Abstract:</p></strong>
              <p><?php echo $row['abstract'];?>.</p>
            </div>


          <?php }
      }?>
      <!--end of php -->


              <div class="keywords">
                  <strong><p>Keywords:</p></strong>
                  <p>Tool is free online keyword research instrument that uses
                     Google Autocomplete to generate hundreds of relevant long-tail keywords for any topic. Google Autocomplete is a feature used in Google Search. Its purpose is to speed up the searches performed by users on Google.</p>
              </div>

>>>>>>> 129f992aef26d5b3476984b92e4bd426b493b4df

  </head>

<<<<<<< HEAD
      <body>

          <div class="box">
            <div class="imgBx">
              <img src="cover/1.jpg"height="250px">
              <div class="viewscount">
                <strong><p>Views:</p></strong>
                <p>Count: 3</p>
              </div>
              <div class="reference">
                  <strong><p>references:</p></strong>
                  <p><a href="www.pornhub.com">https://www.youjazz.com</a></p>
                    <p><a href="www.pornhub.com">https://www.cornhub.com</a></p>
              </div>
            </div>
            <div class="content">
              <div class="title">
              <h2>Book Title</h2>
            </div>
            <div class="abstract">
              <strong><p>Abstract:</p></strong>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It wa of Lorem Ipsum.</p>
            </div>

              <div class="keywords">
                  <strong><p>Keywords:</p></strong>
                  <p>Tool is free online keyword research instrument that uses Google Autocomplete to generate hundreds of relevant long-tail keywords for any topic. Google Autocomplete is a feature used in Google Search. Its purpose is to speed up the searches performed by users on Google.</p>
              </div>



=======
>>>>>>> 129f992aef26d5b3476984b92e4bd426b493b4df
            </div>
          </div>
      </body>


</html>
