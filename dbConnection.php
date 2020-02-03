<?php
$con=mysqli_connect("localhost","root","");
if(!$con){
echo("connection to database failed");
}else{
echo("connection establishment successful");
header("location:contact me.php");

}
   mysqli_select_db($con,"project")or die ("could not select the database");
   //receive form data and store in variable
   $name=$_POST['name'];
   $email=$_POST['email'];
   $cellephone=$_POST['cellephone'];
   $Subject=$_POST['Subject'];
   $message=$_POST['message'];
     
      //execute a querry to insert data into a table
   mysqli_query($con,"insert into contact(name,email,cellephone,Subject,message)values('$name',' $email',' $cellephone',' $Subject',' $message')");
 
   
 
?>
