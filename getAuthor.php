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
    <fieldset>
        <legend style="font-size:30px;">Authours Info</legend>
    
<form action="capture.php" method="POST" enctype="multipart/form-data">
    <table name="aut_list" id="aut_list">
            <th>FIRST NAME</th>
            <th>MIDDLE NAME</th>
            <th>LAST NAME</th>
            <th>SUFFIX</th>
            <th>ADDRRESS</th>
            <th>CONTACT</th>
            <th>EMAIL</th>
    </table> 
    <p>
    <button type="button" onclick = "addInput()">Add Author</button>
    <button type="submit" name="submit">Add Author</button>
    </p>
</form>
    <div id="div-author" style="display:none;">
    </fieldset> 
    <br/>
    <span style="float: right">
            <button type="button" id="btn_prev" onclick="setPage('prev')" style="display: none">Previous</button>
            <button type="button" id="btn_next" onclick="setPage('next')">Next</button>
            <button type="submit" id="btn_submit" style="display: none" name="submit">Submit</button>
    </span>
    <br/>
    </div>
    </body>
</html>