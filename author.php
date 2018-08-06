<!DOCTYPE html>
<!-- ANNE -->
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>Author - BUKSU RRMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/author-new.css">
</head>
<body id="annebody">

  <?php


  $auth_id = $_GET['aut_id'];

?>


  <div class="anneauthor">
    <?php
          include_once 'connection.php';
          $dbconfig = new dbconfig();
          $con = $dbconfig->getCon();
          $query = "SELECT * FROM `author` WHERE a_id = $auth_id";
          $result = $con->query($query);

          if ($result->num_rows>0) {
            while ($row=$result->fetch_assoc()) {
              #echo $row['a_id'] . " " . $row['a_fname'] . " " . $row['a_mname'] . " " . $row['a_lname'] . " " . $row['a_suffix'] . " " . $row['a_add'] . " " . $row['a_contact'] . " " . $row['a_email'];

     ?>
      <h2><?php echo $row['a_fname'] . " " . $row['a_mname'] . " " . $row['a_lname'] . " " . $row['a_suffix']; ?></h2>
      <p> <?php echo $row['a_contact']; ?>
      <br> <?php echo $row['a_email']; ?>
      <br> <?php echo $row['a_add']; ?> </p>
    <?php }
  } ?>
  </div>
          <div class="annebooks">
              <h3> AUTHORED RESEARCH PAPER </h3>
                  <hr>
          </div>

            <div class="annelist">
                      <ul>
                        <?php
                          include_once 'connection.php';
                          $dbconfig = new dbconfig();
                          $con = $dbconfig->getCon();
                          $query = "SELECT book.book_id, book.book_title FROM book INNER JOIN junc_authorbook ON book.book_id = junc_authorbook.book_id WHERE junc_authorbook.aut_id = $auth_id";
                          $result = $con->query($query);

                              if ($result->num_rows>0) {
                                while ($row=$result->fetch_assoc()) {

                           ?>


                        <a href="bookdetails.php?book_id=<?php echo $row['book_id']; ?>"><li> <?php echo $row['book_title']; ?> </li> </a> <br>

                      <?php }
                    } ?>

                      </ul>
                  </div>


</body>
