<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script>
        
        function addInput(){
            //alert("hellow");
                var fname = document.createElement("input");
                fname.type = "text";
                fname.name = "fname[]";
                fname.placeholder = "First Name";

                var mname = document.createElement("input");
                mname.type = "text";
                mname.name = "mname[]";
                mname.placeholder = "Middle Name";

                var lname = document.createElement("input");
                lname.type = "text";
                lname.name = "lname[]";
                lname.placeholder = "Lastname";

                var suf = document.createElement("input");
                suf.type = "text";
                suf.name = "suf[]";
                suf.placeholder = "Suffix (e.g: Jr. / Sr.)";

                var add = document.createElement("input");
                add.type = "text";
                add.name = "add[]";
                add.placeholder = "Address";

                var contact = document.createElement("input");
                contact.type = "text";
                contact.name = "contact[]";
                contact.placeholder = "Contact";

                var email = document.createElement("input");
                email.type = "text";
                email.name = "email[]";
                email.placeholder = "Email";
                
                var table = document.getElementById("aut_list");
                var row = table.insertRow(1);
                //row.insertCell(0).innerHTML=fname;
               /* row.insertCell(1).innerHTML=mname;
                row.insertCell(2).innerHTML=lname;
                row.insertCell(3).innerHTML=suf;
                row.insertCell(4).innerHTML=add;
                row.insertCell(5).innerHTML=contact;
                row.insertCell(6).innerHTML=email;
                */

                var fnameCon = row.insertCell(0);
                fnameCon.appendChild(fname);

                var mnameCon = row.insertCell(1);
                mnameCon.appendChild(mname);

                var lnameCon = row.insertCell(2);
                lnameCon.appendChild(lname);

                var sufCon = row.insertCell(3);
                sufCon.appendChild(suf);

                var addCon = row.insertCell(4);
                addCon.appendChild(add);

                var conCon = row.insertCell(5);
                conCon.appendChild(contact);

                var emailCon = row.insertCell(6);
                emailCon.appendChild(email);


                //alert("hello buttom");
        }

        window.onload = addInput;
    
    </script>
</head>
<body>
    <fieldset>
        <legend>Authours Info</legend>
    
    <form action="arrayinput.php" method="POST" enctype="multipart/form-data">
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
    <button type="submit" id="btn_submit" name="submit">Submit</button>
    </p>
    </form>
    </fieldset>
    </body>
</html>