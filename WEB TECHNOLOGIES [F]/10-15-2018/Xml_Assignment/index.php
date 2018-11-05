<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Three Aces</title>
	<style>
		body{
			margin: 0px;
			padding: 0px;
			background: #ffffff;
		}
		#container{
			width: 80%;
			margin: 2% auto;
			background: #ffffff;
		}
		#form{
			width: 50%;
			height: 300px;
			background: #ffffff;
			font-size: 18px;
			margin: auto;
			padding-top: 20px;
		}
		form{    
			text-align: center;
		}
		input[type=submit]{
			margin-left: 55px;
			cursor: pointer;
			font-size: 14px;
		}
		input{
			margin-top: 10px;
		}
		input[type=text]{
			margin-left: 10px;
			font-size: 16px;
		}
		input[type=number]{
			margin-left: 15px;
			font-size: 16px;
		}
		#item{
			margin-left: 19px;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="form">
			<form name="xmlwrite" method="post" action="write.php">
				Menu :<input type="text" name="menu" placeholder="menu" value=""/></br>
				Item :<input id="item" type="text" name="item" placeholder="item" value=""/></br>
				Price :<input type="number" name="price" placeholder="price" value=""/></br>
				<input type="submit" value="Submit">
				<input type="reset"/>
			</form>
		</div>
	<div>
</body>
</html>