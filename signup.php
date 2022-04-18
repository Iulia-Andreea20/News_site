<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

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
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>News</title>
</head>
<body>

	<h1 style="text-align: center;">News</h1>

	<form method="post">
		<div class="mb-3">
		  <label for="username" class="form-label">Username</label>
		  <input type="username" class="form-control" id= "user_name" name = "user_name">
		  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		</div>
		<div class="mb-3">
		  <label for="password" class="form-label">Password</label>
		  <input type="password" class="form-control" id="password" name="password">
		</div>
		<div class="mb-3">
		  <label for="password" class="form-label">Select your role</label>
		<select class="form-select form-select mb-3" aria-label=".form-select-lg example">
			<option value="1">Click here to select</option>
  			<option value="2">Reader</option>
  			<option value="3">Journalist</option>
  			
		</select>
		</div>
		<button type="submit" class="btn btn-primary">Sign Un</button>

		<a href="login.php">
			<button type="button" class="btn btn-primary" >Log In</button>
		  </a> 
	  </form>
</body>
</html>