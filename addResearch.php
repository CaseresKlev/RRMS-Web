


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" type="text/css" href="addstyle.css">
    <title>Add Research Document - BUKSU RRMS</title>
</head>
<body>
    <div id="Nav-Bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Browse Research.php">Browse Research</a></li>
            <li><a href= "Plagiarism.php">Plagiarism</a></li>
            <li><a href = "Login.php">Login</a></li>
        </ul>
    </div>
    <div class="header">
      <h1>Add Document</h1>
    </div>
    <div id="content">
       <div id ="forms">
         <form id="form-group" action ="add.php"method="post">
           <center><input type="text" name="book_title" placeholder="Book title" ></center><br><br>
           <center><textarea rows="4" cols="20" placeholder="abstract"></textarea></center><br><br>
           <input type="date" name="pubdate" placeholder=""><br><br>

           <select name="category">
             <?php include 'dbconfig.php';
             $query = "SELECT * FROM `category`";
             $result = $conn->query($query);

             if ($result->num_rows > 0) {
               while($row=$result->fetch_assoc()){?>
                 <option><?php echo $row["cat_name"]; ?></option>
               <?php
             }
             }
              ?>
           </select>
          <input type="submit" name="btn-submit">
        </forms>



       </div>
    </div>
</body>
</html>
