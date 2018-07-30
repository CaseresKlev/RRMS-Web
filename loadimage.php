
 <!DOCTYPE html>

<html>

 <head>


 </head>

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
       echo $row['cover'];
     }
   }
   echo $query;

    ?>
   <img src="img/1.jpg">


 </body>


 </html>
