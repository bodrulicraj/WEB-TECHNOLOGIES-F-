<?php
	
	$username_error = $email_error = $pass_error = $cpass_error = $name_error = $gender_error = $check_error = $info = "";
	
	$username = $email = $password = $cpassword = $fname = $lname = "";
	
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
		
		
		if(empty($_POST["email"])){
			$email_error = "Email is required";
			$boolen = false;
		}else{
			$email = test_input($_POST["email"]);
			$email_error = "";
			if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
				$email_error = "Invalid email format";
				$boolen = false;
			}else{
				if($boolen){
					$boolen = true;
				}else{
					$boolen = false;
				}
			}
		}		
				
		if(empty($_POST["password"])){
			$pass_error = "Password is required";
			$boolen = false;
		}else{
			$str = $_POST["password"];
			$passln = strlen($str);
			
			if($passln > 15){
				$pass_error = "Password Should be less than 15 charecters";
				$boolen = false;
				
			}elseif($passln < 5 && $passln >= 1){
				$pass_error = "Password Should be greater than 6 charecters";
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
				
		if(empty($_POST["cpassword"])){
			$cpass_error = "Password is required";
			$boolen = false;
		}elseif($_POST["cpassword"] != $password){
			$cpass_error = "Password don't match!";
			$boolen = false;
		}else{
			$cpassword = test_input($_POST["cpassword"]);
			$cpass_error = "";
			if($boolen){
				$boolen = true;
			}else{
				$boolen = false;
			}
		}
				
		if(empty($_POST["first_name"]) || empty($_POST["last_name"])){
			$name_error = "Name is required";
			$boolen = false;
		}else{
			$fname = test_input($_POST["first_name"]);
			$lname = test_input($_POST["last_name"]);
			$name_error = "";
			if($boolen){
				$boolen = true;
			}else{
				$boolen = false;
			}
		}
				
		if(empty($_POST["gender"])){
			$gender_error = "Gender is required";
			$boolen = false;
		}else{
			$gender = test_input($_POST["gender"]);
			$gender_error = "";
			if($boolen){
				$boolen = true;
			}else{
				$boolen = false;
			}
		}
		
				
		if(isset($_POST["check1"]) && isset($_POST["check2"])){
			$check_error = "";
			$agree = true;
		}else{
			$check_error = "Do you agree with this Conditions?";
			$agree = false;
		}
	}
	
	if($boolen){
		if($agree){
			$dbname = "registration";
			$con = mysqli_connect("localhost","root","",$dbname);
					
			if(!$con){
				die("Connection Failed:" + mysqli_connect_error());
			}
			
			function SignUp(){
				$user = $_POST["username"];
				$email = $_POST["email"];
				
				$sql1 = "SELECT * FROM signup WHERE username = '$user'";
				$sql2 = "SELECT * FROM signup WHERE email = '$email'";
						
				$result1= mysqli_query($GLOBALS['con'],$sql1);
				$result2= mysqli_query($GLOBALS['con'],$sql2);
				
						
				if(!$row1 = mysqli_fetch_array($result1)){
					if(!$row2 = mysqli_fetch_array($result2)){
						NewUser();
					}else{
						$GLOBALS['email_error'] = "Email already exist!";
					}
				}else{
					$GLOBALS['username_error'] = "Username already exist!";
				}	
			}
			
			function NewUser(){
				
				$user = $_POST["username"];
				$email = $_POST["email"];
				$pass = $_POST["password"];
				$name = $_POST["first_name"]." ".$_POST["last_name"];
				$gender = $_POST["gender"];
				
				$token = 'hiafgestyzujklmdvnopqrwxbcEFGVWOPQXYHIMNCDRSABTUZJKL3401892567';
				$token = str_shuffle($token);
				$token = substr($token,0,10);
				
				$sql = "INSERT INTO signup(username,email,password,name,gender,token) VALUES('$user','$email','$pass','$name','$gender','$token')";
						
				$query = mysqli_query($GLOBALS['con'],$sql);
						
				if($query){
					/*$mail = new PHPMailer();
					$mail->setFrom('alaminhaoladermegh@gmail.com');
					$mail->addAddress($email,$name);
					$mail->subject = "Email Confirmation";
					$mail->isHTML(true);
					$mail->Body = "Please, verify your email by clicking the below link";*/
					
					//if($mail->send()){
						$GLOBALS['username'] = $GLOBALS['email'] = $GLOBALS['password'] = $GLOBALS['cpassword'] = $GLOBALS['fname'] = $GLOBALS['lname'] = $GLOBALS['gender'] = "";
					
						$GLOBALS['boolen'] = false;
						$GLOBALS['agree'] = false;
					
						$GLOBALS['info'] = "Registration Successfull!Verify email";
					//}else{
						//$GLOBALS['info'] = "Somthing is wrong";
					//}
					
				}else{
					$GLOBALS['info'] = "Registration Failed! Try Again";
				}
				//$GLOBALS['info'] = "";
			}
			
			if(isset($_POST["submit"])){
				SignUp();
				mysqli_close($GLOBALS['con']);
				$boolen = false;
			}else{
				echo "<script>
						alert('Submit Again!');
					  </script>";
			}
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
				<h3>Registration Form</h3>
			</div>
			<span id="error_msg"><?php echo $info;?></span>
			<div class="form_content">
				<div class="content1 content_area">
					<input type="text" name="username" id="txtuser" placeholder="Enter Username" value="<?php echo $username;?>" />
					<span id="c1" class="glyphicon glyphicon-user"></span>
				</div>
				<span id="error_msg"><?php echo $username_error;?></span>
				
				<div class="content2 content_area">
					<input type="text" name="email" id="txtemail" placeholder="Enter Email" value="<?php echo $email;?>" />
					<span id="c2" class="glyphicon glyphicon-envelope"></span>
				</div>
				<span id="error_msg"><?php echo $email_error;?></span>
				
				<div class="content3 content_area">
					<input type="password" name="password" id="txtpass" placeholder="Enter Password" value="<?php echo $password;?>" />
					<span id="c3" class="glyphicon glyphicon-lock"></span>
				</div>
				<span id="error_msg"><?php echo $pass_error;?></span>
				
				<div class="content4 content_area">
					<input type="password" name="cpassword" id="txtcpass" placeholder="Confirm Password" value="<?php echo $cpassword;?>" />
					<span id="c4" class="glyphicon glyphicon-lock"></span>
				</div>
				<span id="error_msg"><?php echo $cpass_error;?></span>
				
				<div class="content5">
					<input type="text" name="first_name" id="" placeholder="First Name" value="<?php echo $fname;?>" />
					<input type="text" name="last_name" id="" placeholder="Last Name" value="<?php echo $lname;?>" />
				</div>
				<span id="error_msg"><?php echo $name_error;?></span>
				
				<div class="content6">
					<h3>Gender:</h3>
					<input type="radio" name="gender" value="male" /> <label for="">Male</label>
					<input type="radio" name="gender" value="female" /> <label for="">Female</label>
					<input type="radio" name="gender" value="other" /> <label for="">Other</label>
				</div>
				<span id="error_msg"><?php echo $gender_error;?></span>
				
				<div class="content7">
					<input type="checkbox" name="check1" value="" id="" />
					<span id="ck1" >I Agree With Policy & Service</span> <br/>
					<input type="checkbox" name="check2" value="" id="" />
					<span id="ck1" >I Want to Receive News & Offers</span>
				</div>
				<span id="error_msg"><?php echo $check_error;?></span>
				
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
				var $txt2 = $("txtemail");
				var $txt3 = $("txtpass");
				var $txt4 = $("txtcpass");
				
				$("input").focus(function(){
					var id = document.activeElement.id;
					
					
					if(id=="txtuser"){
						$("#c1").css("color","green");
						icon = "#c1";
					}
					
					if(id=="txtemail"){
						$("#c2").css("color","green");
						icon = "#c2";
					}
					
					if(id=="txtpass"){
						$("#c3").css("color","green");
						icon = "#c3";
					}
					
					if(id=="txtcpass"){
						$("#c4").css("color","green");
						icon = "#c4";
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