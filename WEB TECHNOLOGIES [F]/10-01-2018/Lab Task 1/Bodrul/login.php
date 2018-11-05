<?php
$uname= $_POST['username'];
$fname= $_POST['fullname'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$pass= $_POST['password'];
$gender= $_POST['gender'];
$ed = $_POST['edulvl'];

echo "Your Nane Is : ".$uname.'</br>';
echo "Your Full Nane Is : ".$fname.'</br>';
echo "Your Email Id : ".$email.'</br>';
echo "Your Phone Number: ".$phone.'</br>';
echo "Your Password : ".$pass.'</br>';
echo "Your Gender : ".$gender.'</br>';
echo "Your Education : ";
foreach ($ed as $education){
	echo $education. '<br>';
}
?>