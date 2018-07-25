<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="css/add-research.css" />-->
    <script src="main.js"></script>
</head>
<body>
<div id = "page3" >
                    <p>
                        First Name
                        <input type="text"placeholder="First name" oninput="this.className = ''" name="fname">
                    </p>
                    <p>
                      Middle Name
                        <input type="text" placeholder="Middle name" oninput="this.className = ''" name="mname">
                    </p>
                    <p>
                        Last Name
                        <input type="text" placeholder="Last name" oninput="this.className = ''" name="lname">
                    </p>
                    <p>
                        Suffix
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
                    <p><br/>    
                     <input type="checkbox"name="vehicle3" value="Boat" checked> I want others download my file.</center><br>
</div>
<span style="float: right">
            <button type="button" id="btn_prev" onclick="setPage('prev')" style="display: none">Previous</button>
            <button type="button" id="btn_next" onclick="setPage('next')">Next</button>
            <button type="submit" id="btn_submit" style="display: none" name="submit">Submit</button>
</span>
<br/>
</body>
</html>