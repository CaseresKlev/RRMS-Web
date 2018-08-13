<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/bookdet.css">
</head>
  <header>
    <?php include_once 'header.php';?>
  </header>
<body>

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

  <div class="wrapper">
<table bgcolor="#ffffff" width="100%" height="326">
  <tr >

    <td width="40%"height="350px" id="col1"> <img src="<?php echo $row['cover']?>" style="display:block"; width="100%" height="100%"></td>
    <td id="col2">
      <table height=100%>
        <tr>
          <td id="booktitle" class"det"><strong><?php echo $row['book_title']; ?></strong>
            <hr>
          </td>

        </tr>
        <tr class"det">


          <td><strong>Author:</strong>
          <?php
  				$dbconfig= new dbconfig();
  				$con= $dbconfig -> getCon();
  				$query= "SELECT DISTINCT(a_id) as 'a_id' , a_lname as 'a_lname', SUBSTRING(a_fname, 1, 1) as 'a_fname' FROM author INNER JOIN junc_authorbook on author.a_id = junc_authorbook.aut_id WHERE junc_authorbook.book_id =$id";
  				$result = $con -> query($query);
  				$autorList ="";
  				if($result->num_rows>0){
  					while ($row1 = $result->fetch_assoc()) {
  					//	$autorList .= $row['a_lname'] . ", " . $row['a_fname'] . "; ";
            ?>
            <a href="author.php?aut_id=<?php echo $row1['a_id']; ?>" style="font-weight: bold; font-size: 14pt">  <?php echo $row1['a_lname'] . ", " . $row1['a_fname'] . "; ";?>
              </a>
        <?php }
      } ?>
      </td>
        </tr>
        <td>

        </td>
        <td>

        </td>
        <tr class"det">
          <td><strong>Date Submitted:</strong> <?php echo $row['pub_date']; ?></td>
        </tr>
        <!-- <tr class"det">
          <td><strong>Revision:</strong> 2</td>
<<<<<<< HEAD
        </tr>
        <tr class"det">
          <td><strong>Status:</strong> <?php echo $row['status']; ?></td>
        </tr>
=======
        </tr> -->
>>>>>>> 414c252ca285c09df0d5769e3ecf913b5e3f7e88
        <tr class"det">
          <td><strong>Status:</strong><?php echo $row['status']; ?></td>
        </tr>
        <!-- <tr class"det">
          <!-- <td><strong>Views:</strong><?php //echo " " .  $row['views_count']; ?></td> -->
        </tr> -->
        <tr >


          <td><strong>Keywords:</strong> <i style="color:blue;">
            <?php
            $dbconfig3= new dbconfig();
            $con3= $dbconfig3 -> getCon();
            $query3= "SELECT key_words FROM keywords INNER JOIN junc_bookkeywords ON keywords.id=junc_bookkeywords.keywords_id WHERE junc_bookkeywords.book_id=$id";
            $result3 = $con3-> query($query3);

            if ($result3->num_rows>0) {
              while ($row3=$result3->fetch_assoc()) {

                echo $row3['key_words'] . ", " ;
              }
            }

            ?>

          </i>
          </td>

        </tr>
        <tr >
          <td><strong>Cited:</strong> 5 Times</td>
        </tr>

        <tr >
          <?php
            $dbconfig6= new dbconfig();
            $con6= $dbconfig6 -> getCon();
            $query6= "SELECT referencekey.refkey FROM `referencekey` WHERE referencekey.book_id = $id";
            $result6 = $con6 -> query($query6);
            $row6 = $result6->fetch_assoc();

          ?>

          <td>Citation Key: <b style="color: blue"><?php echo $row6['refkey'] ?></b></td>
        </tr>
        <br>

        <?php
        //echo $row['dowloadable'];
          if($row['dowloadable']==1){
            echo "<tr >
                    <td><b><a href=" . $row['docloc'] . ">Download</a></b></td>
                  </tr>";
          }
        ?>
        



      </table>


    </td>
  </tr>
  <tr>

    <td colspan="2">
      <hr>
      <strong style="font-size: 20pt;"><em>Abstract:</em></strong><br/>
      <p>&emsp;<?php echo $row['abstract'];?>
      </p>
    </td>

  </tr>
<?php }
} ?>
  <tr>
    <td colspan="2">
      <hr>

      <strong style="font-size: 20pt;"><em>References:</em></strong><br/>
      <ul>

        <?php
        $dbconfig= new dbconfig();
        $con= $dbconfig -> getCon();
        $query= "SELECT ref.id, ref.reftitle, ref.link FROM ref INNER JOIN junk_bookref ON ref.id = junk_bookref.webref_id WHERE book_id = $id";
        $result = $con -> query($query);
        if ($result->num_rows>0) {
          while ($row2=$result->fetch_assoc()) {

         ?>
        <a style="text-decoration: none;" <?php echo "href=" . $row2['link']  .  " target=" . "\"_blank\"";  ?> ><li><b><em><?php echo $row2['reftitle']; ?></em></em><b></br><?php echo $row2['link'];?></li></a>
      <?php }
    } ?>

      </ul>
      <hr>
    </td>

  </tr>

</table>

</div>
<br/>

<?php include_once 'Footer.php'?>
</body>

</html>
