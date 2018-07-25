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

<form action="prepare.php">
    <div id="enclosure">
        <div id = "page1" style="height=500px">

            <div id="browse">
                <p>
                    <strong> Choose Word File:</strong><br/>
                    <input type="file" id="myFile" name="fileup" accept="pdf/*"required>
                </p>
            </div>
            <div class="browse">
                <p>
                  <strong>  Choose Cover:</strong><br/>
                    <input type="file" id="myCover" accept="image/*">
                </p>
            </div>
            <div id="bookDet">
                <p class="para">
                  <strong>  Title:</strong><br>
                  <center>  <input type="text" name="tittle" placeholder="Book title"><br></center>
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
                    <strong>Category:</strong><br/>
                    <select name="category">
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
                  <strong>  Key Words:</strong><br/>
                    <textarea rows="6" cols="102" placeholder="Key Words" name="keywords"></textarea><br/>
                </p>
                <p id="para">
                  <strong>  Web Reference:</strong><br/>
                    <textarea rows="6" cols="102" placeholder="Key Words" name="keywords"required></textarea><br/>
                </p>
            </div>
    </div>
    <div id = "page2" style="display:none">
        <p>Insert Author details</p>
            <div class="row">
                <div class="column">
                    <p>
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
                    </p>
                         <center>
                        <button type="button" onclick="loadToTable()">Add Author</button>
                        </center>

                </div>
                <div class="column">
                    <p>Author List</p>
                    <table width="100%" id="author-table">
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
<button type="button" id="btn_prev" onclick="setPage('prev')" style="display: none">Previous</button>
<button type="button" id="btn_next" onclick="setPage('next')">Next</button>
<button type="submit" id="btn_submit" style="display: none">Submit</button>
</span>
    </div>

</form>

</body>
</html>