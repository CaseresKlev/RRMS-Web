<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="css/add-research.css" />-->
    <script src="js/add-research.js"></script>
    
    <script>
        
        
        window.onload = addInput;
    
    </script>
</head>
<body>
<form action="createBook.php" method="POST" enctype="multipart/form-data">
	<div id = "page1" style="height=500px">

            <div class="browse">
                <p>
                <label for="myCover" >Choose Word Document</label>
                    <input type="file" id="myFile" name="file" accept="Documents/docx">
                </p>
            </div>
            <div class="browse">
                <p>
                    <label for="myCover" >Choose Cover</label>
                    <input type="file" id="myCover" name="cover" accept="image/*">
                </p>
            </div>
            <div id="bookDet">
                <p class="para">
                    Title
                  <input type="text" placeholder="Book title"  name="title">
                </p>
                <p class="para">
                    Abstract
                    <textarea rows="6" cols="102" placeholder="Abstract" name="abstract"></textarea><br/>
                </p>
                <p class="para">
                    Publication Date
                    <input type="date" width="100%" name="pubdate" placeholder="">
                </p>
                <p class="para">
                    Category
                    <select name="department">
                    <?php include_once 'connection.php';
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $query= "SELECT * FROM department";
                         $result= $conn->query($query);
                         if ($result->num_rows > 0) {
                             while ($row=$result->fetch_assoc()) { ?>
                            <option><?php echo $row["cat_name"]; ?></option>
                        <?php
                             }
                         }
                         ?>
                    </select>
                </p>
                <p id="para">
                    Key Words<strong style="color:red">&emsp; One Keywords per Line</strong></note>
                    <textarea rows="6" cols="102" placeholder="Key Words" name="keywords"></textarea><br/>
                </p>
                <p id="para">
                 Reference: <strong style="color:red">&emsp; One Refrence per Line</strong></note><br/>
                    <textarea rows="6" cols="102" placeholder="Key Words" name="reference"></textarea><br/>
                </p>
            </div>
    </div>
    <br/>
    <span style="float: right">
            <button type="button" id="btn_prev" onclick="setPage('prev')" style="display: none">Previous</button>
            <button type="button" id="btn_next" onclick="setPage('next')">Next</button>
            <button type="submit" id="btn_submit" style="display: none" name="submit">Submit</button>
    </span>
    <br/>
</table>
</body>
</html>