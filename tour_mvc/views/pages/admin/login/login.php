
<?php
error_reporting(0);
// session_start();
?>  
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="public/css/login.css">
	
</head>
<body>
	<div class="container">
		<div class="content">
			<form method="POST" action="#">
				<div class="form">
					<h2>Admin</h2>
					<div class="form1">
						<div class="use_name">
							<h4>Username:</h4>
							<p><input type="text" name="username" placeholder="Username" value="<?php echo $user_name;?>"></p>
							<span style="color: aqua"><?php echo $errUsername; ?></span>
						</div>
						<div class="pass">
							<h4>Password:</h4>
							<p><input type="password" name="password" placeholder="Password" value="<?php echo $pass;?>"></p>
							<span style="color: aqua"><?php echo $errPass; ?></span>
						</div>
						<div>
							<p class="register">Register User? <a href="register.php">Click here</a></p>
						</div>
					</div>	
					<div class="form2">
						<input type="submit" name="Submit" value="Login">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>