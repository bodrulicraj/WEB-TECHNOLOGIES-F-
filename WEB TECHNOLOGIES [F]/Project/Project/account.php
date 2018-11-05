<?php
	session_start();
	
	if(!isset($_SESSION['username']) && !isset($_SESSION['username'])){
		header("location: login.php");
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['logout'])){
			header("location: login.php");
			session_destroy();
		}
	}
	
	
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylesheet" href="registration.css" />
	<link rel="stylesheet" href="account.css" />
	
	<style>
		@import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro');
	</style>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="registration_form client_area">
				<div class="content8">
					<h3 id="txt">Welcome, <?php echo $_SESSION['username'];?></h3>
					<input id="btnlgout" type="submit" name="logout" value="Logout" />
				</div>
			</div>
		</div>
	</form>
</body>
</html>