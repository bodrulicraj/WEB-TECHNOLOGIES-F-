<?php
session_start();//start the PHP_Session
if(!isset($_SESSION['username'])){
	header("location:index.php");
}
else{
	
}
?>