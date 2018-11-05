<?php
	session_start();
	
	$username_error = $pass_error = $check_error = $info = "";
	
	$username = $password = "";
	
	$boolen = false;
	$agree = false;
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if(empty($_POST["username"])){
			$username_error = "Username is required";
			$boolen = false;
		}else{
			$username = test_input( $_POST["username"] );
			$username_error = "";
			$boolen = true;
		}
		
		if(empty($_POST["password"])){
			$pass_error = "Password is required";
			$boolen = false;
		}else{
			$password = test_input($_POST["password"]);
			$pass_error = "";
			if($boolen){
				$boolen = true;
			}else{
				$boolen = false;
			}
		}
	}
	
	if($boolen){
		$dbname = "registration";
		$con = mysqli_connect("localhost","root","",$dbname);
					
		if(!$con){
			die("Connection Failed:" + mysqli_connect_error());
		}
			
		function Login(){
			$user = $_POST["username"];
			$pass = $_POST["password"];
				
			$sql = "SELECT * FROM signup WHERE username = '$user' AND password = '$pass'";
						
			$result= mysqli_query($GLOBALS['con'],$sql);
				
						
			if(!$row = mysqli_fetch_array($result)){
				$GLOBALS['info'] = "Something is wrong!";
				$GLOBALS['username'] = $GLOBALS['password'] = "";
			}else{
				if($user == $row['username'] && $pass == $row['password']){
					$_SESSION['username'] = $user;
					$_SESSION['password'] = $pass;
					
					//$GLOBALS['info'] = "Login";
					
					header("location: account.php");
				}
				else{
					$GLOBALS['username'] = $GLOBALS['password'] = "";
					$GLOBALS['info'] = "Invalid Password or Username";
				}
			}	
		}
			
		if(isset($_POST["submit"])){
			Login();
			mysqli_close($GLOBALS['con']);
			$boolen = false;
		}else{
			echo "<script>
					alert('Submit Again!');
				</script>";
		}
	}
	
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylesheet" href="css/bootstrap/css/glyphicon.css" />
	<link rel="stylesheet" href="registration.css" />
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	
	<style>
		@import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro');
	</style>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="registration_form">
			<div class="form_title">
				<h3> Login Form</h3>
			</div>
			<span id="error_msg"><?php echo $info;?></span>
			<div class="form_content">
				<div class="content1 content_area">
					<input type="text" name="username" id="txtuser" placeholder="Enter Username" value="<?php echo $username;?>" />
					<span id="c1" class="glyphicon glyphicon-user"></span>
				</div>
				<span id="error_msg"><?php echo $username_error;?></span>
				
				<div class="content3 content_area">
					<input type="password" name="password" id="txtpass" placeholder="Enter Password" value="<?php echo $password;?>" />
					<span id="c2" class="glyphicon glyphicon-lock"></span>
				</div>
				<span id="error_msg"><?php echo $pass_error;?></span>
				
				<div class="content8">
					<input type="submit" name="submit" value="Submit" />
					<input type="reset" name="reset" value="Reset" id="" />
				</div>
			</div>
		</div>
	</form>
	
	<script>
			$(document).ready(function(){
				var icon="";
				var $txt1 = $("txtuser");
				var $txt2 = $("txtpass");
				
				$("input").focus(function(){
					var id = document.activeElement.id;
					
					
					if(id=="txtuser"){
						$("#c1").css("color","green");
						icon = "#c1";
					}
					
					if(id=="txtpass"){
						$("#c2").css("color","green");
						icon = "#c2";
					}
				});
				
				$("input").blur(function(){
					$(icon).css("color","#b2b2b2");
					
					/*
					if($(txt1).val() == ""){
						$("#c1").css("color","#b2b2b2");
					}else{
						$("#c1").css("color","green");
					}
					
					
					if($txt2.val() != ""){
						$("#c2").css("color","green");
					}
					
					if($txt3.val() != ""){
						$("#c3").css("color","green");
					}
					
					if($txt4.val() != ""){
						$("#c4").css("color","green");
					}
					*/
				});
			});
	</script>
</body>
</html>