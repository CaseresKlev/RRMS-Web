<?php
  session_start();
  session_unset();
  session_destroy();
  //print_r($_SESSION);
?>
<!DOCTYPE html>
<!-- ANNE -->

  <html lang="en">

    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>LOGIN</title>
      <link rel="stylesheet" href="css/new-login.css">
    </head>

    <body class="body-login">

      <form class="boxx-login">
        <h1>LOGIN</h1>



      <input type="text" name="username" id="u_name"required pattern="^[A-Za-z0-9]+" placeholder="USERNAME" autocomplete="off">
      <input type="password"name="password" id="password"required pattern="^[A-Za-z0-9]+" placeholder="PASSWORD">
      <input type="button" id="submit" value="Submit">

        <input type="reset" id="reset" value="Clear">
        <br>
        <p id="msg" style="color:red; display:none;"> ERROR </p>
        <br>
        <a href="create_account.php" id="link-login" style="color:white;">Create account</a>


    </form>


    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
    </body>




  </html  >
