<?php ?>
<html>
<head>
</head>
<body>
	<form name="" action="login.php" method="post">
		Username: <input type="text" name="username"><br>
		Full Name: <input type="text" name="fullname"><br>
		Email: <input type="email" name="email"><br>
		Phone: <input type="text" name="phone"><br>
		Password: <input type="password" name="password"><br>
		Confirm Password: <input type="password" name="cpassword"><br>
		Gender: 
			<input type="radio" name="gender" value="male"> Male
			<input type="radio" name="gender" value="female"> Female
			<input type="radio" name="gender" value="other"> Other<br>
		Education: 
			<input type="checkbox" name="edulvl[]" value="SSC"> SSC
			<input type="checkbox" name="edulvl[]" value="HSC"> HSC
			<input type="checkbox" name="edulvl[]" value="BSc"> BSc
			<input type="checkbox" name="edulvl[]" value="MSc"> MSc<br><br>
		
		<input type="submit" value="Submit">
	</form>
</body>
</html>