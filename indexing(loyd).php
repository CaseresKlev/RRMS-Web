<!doctype html>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/indexing(loyd).css">
  <title>Indexing</title>

</head>

<body>


  <form id="regForm" action="actionpage.php" method="post">
    <div class="rrms">
      <h4>Research Record Management System </h4>
    </div>

    <div class="auth">
      <h5>Author: <i>Loyd Anthony Gonzales et. al (2017)</i></h5>
    </div>



      <div class="Browse">
          <label for="files">Select file:</label>
        <input type="file" id="files" accept="files/*">




  <script>
  function myFunction() {
      var x = document.getElementById("myFile");

      x.disabled = true;
  }
  </script>

      </div>

      <div class="Browse">
          <label for="files"><br/>Select Cover (Optional):</label>
        <input type="file" id="myFile" accept="image/*">

      </div>
  <script>
  function myFunction() {
      var x = document.getElementById("myFile");
      x.disabled = true;
  }
  </script>
      <div class="note">

      </div>

       <br/>

       <div class="progressbar">
         <div id="myProgress">
           <div id="myBar"></div>



          </div>
<br/>

        </div>
       <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <strong>Note!</strong> Indexing your Files may take sometimes. Please dont close your browser.
</div>
<br/>
  <div class="button">

    <input type="submit" class="button" value="Submit">

  </div>
  <br/>
</form>
  </body>



</html>
