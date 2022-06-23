<?php 
session_start();

	include("functions/connect-db.php");
	include("functions/functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$invalid_str="/[\'^£$%&*()}{@#~?><>,|=_+¬-]/";

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !preg_match($invalid_str,$user_name))
		{

			//save to database
			$userID = random_num(4);
			$query = "insert into user (userID,username,password) values ('$userID','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<link href="css/login-signup.css" rel="stylesheet">
	<title>Signup</title>
</head>
<body>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>