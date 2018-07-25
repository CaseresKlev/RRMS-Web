<!DOCTYPE html>
<html style="width=70%">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/add-research.css" />
    <script src="js/add-research.js"></script>
    <script>
    /*
    var n = 1;
    (function () {
        for (i=1; i<=3; i++){
             document.getElementById("page" +i).style.display = "none";
        }
        alert("load");
        showCurrentPage(n, "page" + n);
    }());


function setPage(action) {
    if(action == "prev"){
        if(n>1){
            n -=1;
        }
    }else{
        n +=1;
    }

    var page = "page" + n;

   for (i=1; i<=3; i++){
    document.getElementById("page" +i).style.display = "none";
   }
   showCurrentPage(n,page);
}

function showCurrentPage(n,page){
    //alert(n);
    document.getElementById(page).style.display = "block";
    if (n==1){
        document.getElementById("btn_prev").style.display = "none";
    }else{
        document.getElementById("btn_prev").style.display = "inline-block";
    }

    if (n==3){
        document.getElementById("btn_next").style.display = "none";
        document.getElementById("btn_submit").style.display = "inline-block";
    }else{
        document.getElementById("btn_next").style.display = "inline-block";
        document.getElementById("btn_submit").style.display = "none";
    }
}
*/

</script>
</head>
<body>
<h1>Add Research Information</h1>

<form action="prepare.php" method="POST" enctype="multipart/form-data">
    <div id="enclosure">
        <div id = "page1" style="height=500px">

            <div id="browse">
                <p>
<<<<<<< HEAD
                    <strong> Choose Word File:</strong><br/>
                    <input type="file" id="myFile" name="fileup" accept="pdf/*"required>
=======
                     <center>Choose Word File:</center><br/>
                    <input type="file" id="myFile" name="file" accept="Documents/docx">
>>>>>>> 523a82ef0a0424117b83bbc1693c4f041a1ca1da
                </p>
            </div>
            <div class="browse">
                <p>
<<<<<<< HEAD
                  <strong>  Choose Cover:</strong><br/>
                    <input type="file" id="myCover" accept="image/*">
=======
                    <center>Choose Cover:</center><br/>
                    <input type="file" id="myCover" name="cover" accept="image/*">
>>>>>>> 523a82ef0a0424117b83bbc1693c4f041a1ca1da
                </p>
            </div>
            <div id="bookDet">
                <p class="para">
<<<<<<< HEAD
                  <strong>  Title:</strong><br>
                  <center>  <input type="text" name="tittle" placeholder="Book title"><br></center>
=======
                    Title:<br>
                  <center>  <input type="text" placeholder="Book title"  name="title"><br></center>
>>>>>>> 523a82ef0a0424117b83bbc1693c4f041a1ca1da
                </p>
                <p class="para">
                    <strong>Abstract:</strong><br>
                    <textarea rows="6" cols="102" placeholder="Abstract" name="abstract"></textarea><br/>
                </p>
                <p class="para">
                    <strong>Publication Date:</strong><br/>
                    <p><input type="date" width="100%" name="pubdate" placeholder="" required></p>
                </p>
                <p class="para">
<<<<<<< HEAD
                    <strong>Category:</strong><br/>
                    <select name="category">
=======
                    Category:<br/>
                    <select name="department">
>>>>>>> 523a82ef0a0424117b83bbc1693c4f041a1ca1da
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
<<<<<<< HEAD
                  <strong>  Key Words:</strong><br/>
                    <textarea rows="6" cols="102" placeholder="Key Words" name="keywords"></textarea><br/>
                </p>
                <p id="para">
                  <strong>  Web Reference:</strong><br/>
                    <textarea rows="6" cols="102" placeholder="Key Words" name="keywords"required></textarea><br/>
=======
                    Key Words:<strong style="color:red">One Keywords per Line</strong></note><br/><br/>
                    <textarea rows="6" cols="102" placeholder="Key Words" name="keywords"></textarea><br/>
                </p>
                <p id="para">
                 Reference: <strong style="color:red">One Refrence per Line</strong></note><br/>
                    <textarea rows="6" cols="102" placeholder="Key Words" name="reference"></textarea><br/>
>>>>>>> 523a82ef0a0424117b83bbc1693c4f041a1ca1da
                </p>
            </div>
    </div>
    <div id = "page2" style="display:none">
        <p>Insert Author details</p>
            <div class="row">
                <div class="column">
                    <p>
<<<<<<< HEAD
                         First Name<br/>
                        <input type="text" placeholder="First name" id="fname" oninput="this.className = ''" name="fname">
                    </p>
                    <p>
                        Middle Name<br/>
                        <input type="text" placeholder="Middle name" id="mname" oninput="this.className = ''" name="mname">
                    </p>
                    <p>
                        Last Name<br/>
                        <input type="text"placeholder="Last name" id="lname" oninput="this.className = ''" name="lname">
                    </p>
                    <p>
                      Suffix<br/>
                        <input type="text" placeholder="Suffix" id="suf" oninput="this.className = ''" name="suffix">
                    </p>
                    <p>
                        Address<br/>
                        <input type="text" placeholder="Address" id="add" oninput="this.className = ''" name="add">
                    </p>
                    <p>
                        Contact<br/>
                        <input type="text" placeholder="Email" id="contact" oninput="this.className = ''" name="email">
                    </p>
                    <p>
                        Email<br/>
                        <input type="text" placeholder="Email" id="email"oninput="this.className = ''" name="email">
=======
                         <center>First Name</center><br/>
                        <input type="text" placeholder="First name" id="fname" oninput="this.className = ''" name="aut_fname">
                    </p>
                    <p>
                        <center>Middle Name</center><br/>
                        <input type="text" placeholder="Middle name" id="mname" oninput="this.className = ''" name="aut_mname">
                    </p>
                    <p>
                        <center>Last Name</center><br/>
                        <input type="text"placeholder="Last name" id="lname" oninput="this.className = ''" name="aut_lname">
                    </p>
                    <p>
                        <center>Suffix</center><br/>
                        <input type="text" placeholder="Suffix" id="suf" oninput="this.className = ''" name="aut_suffix">
                    </p>
                    <p>
                        <center>Address</center><br/>
                        <input type="text" placeholder="Address" id="add" oninput="this.className = ''" name="aut_add">
                    </p>
                    <p>
                        <center>Contact</center><br/>
                        <input type="text" placeholder="Email" id="contact" oninput="this.className = ''" name="aut_contact">
                    </p>
                    <p>
                        <center>Email</center><br/>
                        <input type="text" placeholder="Email" id="email"oninput="this.className = ''" name="aut_email">
>>>>>>> 523a82ef0a0424117b83bbc1693c4f041a1ca1da
                    </p>
                         <center>
                        <button type="button" onclick="loadToTable()">Add Author</button>
                        </center>

                </div>
                <div class="column">
                    <p>Author List</p>
                    <table width="100%" id="author-table" name="aut_list">
                        <th>FIRST NAME</th>
                        <th>MIDDLE NAME</th>
                        <th>LAST NAME</th>
                        <th>SUFFIX</th>
                        <th>ADDRRESS</th>
                        <th>CONTACT</th>
                        <th>EMAIL</th>
                    </table>
                </div>
            </div>
    </div>
    <div id = "page3" style="display:none">
        <p>Page 3</p>
        <p>
                       First Name<br/>
                        <input type="text"placeholder="First name" oninput="this.className = ''" name="fname">
                    </p>
                    <p>
                       Middle Name<br/>
                        <input type="text" placeholder="Middle name" oninput="this.className = ''" name="mname">
                    </p>
                    <p>
                        Last Name<br/>
                        <input type="text" placeholder="Last name" oninput="this.className = ''" name="lname">
                    </p>
                    <p>
                        Suffix<br/>
                        <input type="text" placeholder="Suffix" oninput="this.className = ''" name="suffix">
                    </p>
                    <p>
                        Address<br/>
                        <input type="text" placeholder="Address" oninput="this.className = ''" name="add">
                    </p>
                    <p>
                        Email
                        <input type="text" placeholder="Email" oninput="this.className = ''" name="email">
                    </p>
                    <p>

                      <center> <input type="checkbox"name="vehicle3" value="Boat" checked> I want others download my file.</center><br><br>
    </div>
    <div id = "page3" style="display:none">
        <p>Adviser Details</p>
                    <p>
                         First Name<br/>
                        <input placeholder="First name" oninput="this.className = ''" name="fname">
                    </p>
                    <p>
                        Middle Name<br/>
                        <input placeholder="Middle name" oninput="this.className = ''" name="mname">
                    </p>
                    <p>
                        Last Name<br/>
                        <input placeholder="Last name" oninput="this.className = ''" name="lname">
                    </p>
                    <p>
                        Suffix<br/>
                        <input placeholder="Suffix" oninput="this.className = ''" name="suffix">
                    </p>
                    <p>
                        Address<br/>
                        <input placeholder="Address" oninput="this.className = ''" name="add">
                    </p>
                    <p>
                        Email<br/>
                        <input placeholder="Emails" oninput="this.className = ''" name="email">
                    </p>

    </div>
    <span style="float: right">
<<<<<<< HEAD
<button type="button" id="btn_prev" onclick="setPage('prev')" style="display: none">Previous</button>
<button type="button" id="btn_next" onclick="setPage('next')">Next</button>
<button type="submit" id="btn_submit" style="display: none">Submit</button>
</span>
    </div>

=======
        <button type="button" id="btn_prev" onclick="setPage('prev')" style="display: none">Previous</button>
        <button type="button" id="btn_next" onclick="setPage('next')">Next</button>
        <button type="submit" id="btn_submit" on_click="test()" style="display: none" name="submit">Submit</button>
    </span>
>>>>>>> 523a82ef0a0424117b83bbc1693c4f041a1ca1da
</form>

</body>
</html>
