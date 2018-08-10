<?php
  session_start();
 ?>
<!doctype html>

  <html lang="en">

    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Create Account</title>
      <link rel="stylesheet" href="css/create_account.css">
    </head>

    <body>

      <form class="boxx">
        <h1>Create Account</h1>

      <input type="text" name="g_name" id="g_name"required pattern="^[A-Za-z]+" placeholder="Group Name" autocomplete="off">
      <input type="text" name="u_name" id="u_name"required pattern="^[A-Za-z0-9]+" placeholder="User Name" autocomplete="off">
      <input type="password"name="password" id="password"required pattern="^[A-Za-z0-9]+" placeholder="Password">
        <input type="text" name="accesscode" id="access" required pattern="^[A-Za-z0-9]+" placeholder="Access Code" autocomplete="off">
      <input type="button" id="submit" value="Submit">

    </form>


    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/validateaccount.js"></script>
    </body>




  </html  >
