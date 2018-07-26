<!DOCTYPE html>
<html style="width=70%">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/add-research.css" />
    <script src="jquery/jquery.js"></script>
    <script>
        //this script for jquery functions

        //call jquery when page is ready
        $(document).ready(function(){

            ///place all your jquery functions here///
            //val = 1;
            $("#prev").click(function(){
                //alert($(this).text() + " " + val);
                //val = val+1;
            })
        });
    </script>
</head>
<body>
<h1>Add Research Information</h1>

<form action="prepare.php" method="POST" enctype="multipart/form-data">
    <div id="enclosure">
        <div id = "page1" style="height=500px">

            <div class="browse">
                <p>
                    <label for="myFile">Choose Word File</label>
                    <input type="file" id="myFile" name="file" accept="Documents/docx">
                </p>
            </div>
            <div class="browse">
                <p>
                    <label for="myCover">Choose Cover</label>
                    <input type="file" id="myCover" name="cover" accept="image/*">
                </p>
            </div>
            <div id="bookDet">
                <p class="para">
                Title
                  <input type="text" placeholder="Book title" id="title" name="title">
                </p>
                <p class="para">
                    Abstract:<br>
                    <textarea rows="6" cols="102" placeholder="Abstract" name="abstract"></textarea>
                </p>
                <p class="para">
                    Publication Date
                    <input type="date" width="100%" name="pubdate" placeholder="">
                </p>
                <p class="para">
                    Category:
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
                    Key Words:<strong style="color:red">&emsp;One Keywords per Line</strong></note>
                    <textarea rows="6" cols="102" placeholder="Key Words" name="keywords"></textarea><br/>
                </p>
                <p id="para">
                 References: <strong style="color:red">&ensp;One Refrence per Line</strong></note><br/>
                    <textarea rows="6" cols="102" placeholder="Key Words" name="reference"></textarea><br/>
                </p>
            </div>
    </div>
    <div id = "page2" style="display:none">
        <fieldset>
            <legend>Authours Info</legend>
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
                </p>
    </fieldset>
    <br/>
    </div>
    <div id = "page3" style="display:none">
        <p>Page 3</p>
        <p>
                        <center> First Name</center><br/>
                        <input type="text"placeholder="First name" oninput="this.className = ''" name="fname">
                    </p>
                    <p>
                      <center>  Middle Name</center><br/>
                        <input type="text" placeholder="Middle name" oninput="this.className = ''" name="mname">
                    </p>
                    <p>
                        <center>Last Name</center><br/>
                        <input type="text" placeholder="Last name" oninput="this.className = ''" name="lname">
                    </p>
                    <p>
                        <center>Suffix</center><br/>
                        <input type="text" placeholder="Suffix" oninput="this.className = ''" name="suffix">
                    </p>
                    <p>
                        <center>Address</center><br/>
                        <input type="text" placeholder="Address" oninput="this.className = ''" name="add">
                    </p>
                    <p>
                        <center>Email</center><br/>
                        <input type="text" placeholder="Email" oninput="this.className = ''" name="email">
                    </p>
                    <p>

                      <center> <input type="checkbox"name="vehicle3" value="Boat" checked> I want others download my file.</center><br><br>
    </div>
    <span style="float: right">
        <div id="bot-nav" class="prev">Previous</div>
        <div id="bot-nav" class="prev">Next</div>
        <div id="bot-nav" class="prev">Submit</div>
    </span>
    <br/>
    </div>
</form>

</body>
</html>