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

			//read from database
			$query = "select * from user where username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['userID'] = $user_data['userID'];
						header("Location: feed.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<link href="css/login-signup.css" rel="stylesheet">

	<title>Login</title>
</head>
<body>
	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>