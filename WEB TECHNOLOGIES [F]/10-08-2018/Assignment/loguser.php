<html>
<head>
<style>
	a{
		text-decoration: none;
	}
</style>
</head>
<body>
<?php
session_start();//start the PHP_Session
//function


$username= "bodrul";
$password= "bodrul";

if($_POST['username']==$username && $_POST[password]==$password){
	$_SESSION['username']=$username;
	header("location:index.php");
}
else{
	echo "Wrong username and password</br></br>";
}
?>
	<button><a href='login.php'>Go Back</a></button>
</body>
</html>