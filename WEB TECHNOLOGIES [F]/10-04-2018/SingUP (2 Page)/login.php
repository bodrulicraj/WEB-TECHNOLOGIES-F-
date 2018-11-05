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

<!--echo "<table border='2'><tr>";
echo "<td>Your Nane Is : ".$uname."</td></tr><tr><td>";
echo "<td>Your Full Nane Is : ".$fname."</td></tr></table>";
echo "<td>Your Email Id : ".$email."</td></tr><tr><td>";
echo "<td>Your Phone Number: ".$phone."</td></tr><tr><td>";
echo "<td>Your Password : ".$pass."</td></tr><tr><td>";
echo "<td>Your Gender : ".$gender."</td></tr><tr><td></table>";
echo "<td>Your Education : ";
foreach ($ed as $education){
	echo $education. '<br>';
}
echo "<table border='0'><tr>";
echo "<td>Username: ".$usr. "</td></tr><tr><td>";
echo "Full Name: ".$fname. "</td></tr></table>";
echo "<td>Email: ".$email. "</td></tr><tr><td>";
echo "</br>Phone: ".$phone. "</td></tr></table>";
echo "<br/><td>Password: ".$pass. "</td></tr><tr><td>";
echo "</br>Gender: ".$gen. "</td></tr></table>";
echo "<br/> Education: ";-->