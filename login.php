
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - BUKSU RRMS</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div id="Nav-Bar">
        <!-- <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Browse Research.php">Browse Research</a></li>
            <li><a href= "Plagiarism.php">Plagiarism</a></li>
            <li><a href = "Login.php">Login</a></li>
        </ul> -->
    </div>
    <div id="content">
        <!-- Place The login Dialog Here.-->
		

	<!-- <div id="frm">
		<form action="process.php" method="POST">
			<p>
				<label>Username:</label>
				<input type="text" id="user" name="user" />
			</p>
			<p>
				<label>Password:</label>
				<input type="password" id="pass" name="pass" />
			</p>
			<p>
				<input type="submit" id="btn" name="Login" />
			</p>
		</form>
	</div> -->
	
	
	<div class="header">
	<h2>LOG IN</h2>
</div>
<form method="post" action="login.php">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="">
	</div>
	<!-- <div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="">
	</div> -->
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<!-- <div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div> -->
	<div class="input-group">
		<button type="submit" class="btn" name="login_btn">LOG IN</button>
	</div>
	

    </div>
</body>
</html>