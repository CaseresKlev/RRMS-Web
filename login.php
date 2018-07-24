<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - BUKSU RRMS</title>
	<link href="login.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="Nav-Bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Browse Research.php">Browse Research</a></li>
            <li><a href= "Plagiarism.php">Plagiarism</a></li>
            <li><a href = "Login.php">Login</a></li>
        </ul>
    </div>
    <div id="content">
        <!-- Place The login Dialog Here.-->
		
		<form name="frmregister"action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
		<table class="form" border="0">

			<tr>
			<td></td>
				<td style="color:red;">
				<?php echo $msg; ?></td>
			</tr> 
			
			<tr>
				<th><label for="name"><strong>Name:</strong></label></th>
				<td><input class="inp-text" name="name" id="name" type="text" size="30" /></td>
			</tr>
			<tr>
				<th><label for="name"><strong>Password:</strong></label></th>
				<td><input class="inp-text" name="password" id="password" type="password" size="30" /></td>
			</tr>
			<tr>
			<td></td>
				<td class="submit-button-right">
				<input class="send_btn" type="submit" value="Submit" alt="Submit" title="Submit" />
				
				<input class="send_btn" type="reset" value="Reset" alt="Reset" title="Reset" /></td>
				
			</tr>
		</table>
	</form>
    </div>
</body>
</html>