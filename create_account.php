<?php
  session_start();

  //$accname = $_SESSION['gname'];
  //$acctype = $_SESSION['type'];
 ?>
<!doctype html>

  <html lang="en">

    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Create Account</title>
      <!-- <link rel="stylesheet" href="css/create_account.css"> -->
      <link rel="stylesheet" href="css/createnew.css">



      <script>


      </script>


    </head>

    <body>

      <form class="boxx">
        <h1>Create Account</h1>

        <div class="sel"style="float:left;">
        <label class="choose" for="anneselect"> Choose Account type:

            <select style="border:0;" id="anneselect">

              <option>Student</option>
              <option>Instructor</option>

          </select>
           </label>
        </div><br/>


            <div class="insdiv">

              <table id="tblins"width="100%"  style="margin-left:auto; margin-right:auto;">
                <tr>

                  <td>  <input class="ins"type="text"placeholder="First name"id="ins_fname"></td>
                  <td>  <input class="ins"type="text" placeholder="Middle name"id="ins_mname"></td>
                  <td>  <input class="ins" type="text" placeholder="Last name"id="ins_lname"></td>
                  <td>  <label class="saff" for="anneselects"></label>

                        <select class="ins"width="100%" name="Suffix"style="border:1;" id="suff">
                            <option class="ins"value="" style="text-align: center;">Suffix </option>
                            <option style="color:black"class="ins"value="0"> JR </option>
                            <option style="color:black"class="ins"value="1"> IV </option>
                            <option style="color:black"class="ins"value="2"> III </option>
                      </select>
                    </div>
                  </td>
                  </tr>

                <tr>
                    <td colspan="4" style="width:100%;">  <input class="ins"type="email" placeholder="Email" id="ins_email"></td>
                </tr>

                <tr>
                  <td colspan="2">  <input class="ins"type="text" name="u_name" id="ins_u_name"required pattern="^[A-Za-z0-9]+" placeholder="User Name" autocomplete="off"></td>
                  <td>  <input class="ins" type="password"name="password" id="ins_password"required pattern="^[A-Za-z0-9]+" placeholder="Password"></td>
                  <td>    <input class="ins" type="text" name="accesscode" id="ins_access" required pattern="^[A-Za-z0-9]+" placeholder="Access Code" autocomplete="off"></td>
                </tr>
              </table>
                      <!-- instructor input name -->

          </div>

          <div class="studiv">

            <input class="stud"type="text" name="g_name" id="g_name"required pattern="^[A-Za-z]+" placeholder="Group Name" autocomplete="off">
            <input class="stud"type="text" name="u_name" id="stud_u_name"required pattern="^[A-Za-z0-9]+" placeholder="User Name" autocomplete="off">
            <input class="stud"type="password"name="password" id="stud_password"required pattern="^[A-Za-z0-9]+" placeholder="Password">

              <input class="stud"type="text" name="accesscode" id="stud_access" required pattern="^[A-Za-z0-9]+" placeholder="Access Code" autocomplete="off">





          </div>

          <input class="stud"type="button" style="width: 50%;"id="submit" value="Submit">
          <div class="checkboxx">
        <label class="show" for="show-password" class="field-toggle">
          Show password
          </label>
          <input class="stud"type="checkbox" id="show-password" class="field-toggle-input" />



    </div>

    </form>


    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/validateaccount.js"></script>

    <script>
        $("#tblins").hide();
    </script>
    </body>






  </html  >
