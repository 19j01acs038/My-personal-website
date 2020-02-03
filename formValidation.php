<?php


$con=mysqli_connect("localhost","root","");
if(!$con){
echo("connection to the database is failed");
}

else{
		echo("established connection successive");
}
mysqli_select_db($con,"project")or die("could  not select the database");

$name=$_POST['name'];
$email=$_POST['email'];
$cellephone=$_POST['cellephone'];
$Subject=$_POST['Subject'];
$message=$_POST['message'];
mysqli_query($con,"INSERT into contact (name,email,cellephone,Subject,message)VALUES('$name','$email','$cellephone','$Subject','$message')");

mysqli_close($con);
?>