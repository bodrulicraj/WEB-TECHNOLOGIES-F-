<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Tour</title>
		<style>
			#container{
				background-color: #99e6e6;
				margin: 5px 5px;
				padding: 10px 5px				
			}
			#title{
				text-decoration: underline;
			}
			#xml_btm{
				
			}
			#xml_input{
				background-color: #99e6e6;
				color: #ffffff;
				font-size: 16px;
				font-style: normal;
				font-weight: bold;
			}
			
			
		</style>
	</head>
	<body>
	<div id='xml_btm'>
		<form method="post" action="xml.php">
			<input id='xml_input' type="submit" value="XML">
		</form>
	</div>		
	
	<?php
	// Create connection
	$con=mysqli_connect("localhost","root","","tour");
	$query="select * from tour";

	$rs=mysqli_query($con,$query);
	foreach($rs as $row){
		echo "<div id='container'>";
		echo "<h4 id='_id'>Tour ID:".$row['id']." | Tour Country ID:".$row['country_id']."</h4><hr>";
		echo "<h4 id='title'>".$row['title']."</h4>";
		echo "<p >".$row['description']."</p>";
		echo "</div>";
	}
	?>

	</body>
</html>
