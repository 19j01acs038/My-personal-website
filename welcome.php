
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="mine.CSS">

</head>
<body>
<header>
<h1> <b>ASUMA NYACHOTI JOSECK</h1></b>
</header>
<section>
<nav>
<ul>
<li><a href="home.php">HOME</a></li>
<li><a href="About.php">About</a></li>
<li><a href="my biography.php">Biography</a></li>
<li><a href="my hobbies.php">Hobbies</a></li>
<li><a href="welcome.php">Contact me</a></li>
<li><a href="login.php">Login</a></li>
</ul>
</nav>
<div class="media">
<image src="jose.jpg"style="float:right;width:370px;height:370px">
</div>
  
  <article>
  <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. you are logged in!.</h1>
<table  border=1 cellpadding=1>

<tr>
<th colspan="5"><h2> Student Records</h2></th>
   </tr>
   <tr>
<th>Name</th>
<th>E-mail</th>
<th>Cellephone</th>
<th>Subject</th>

<th>Mssage</th>

</tr>
<?php
$con =  mysqli_connect('localhost', 'root','');

if(!mysqli_select_db($con,'project'))
{
echo "Database Not Selected";
}

$sql = "SELECT * FROM contact";

$records = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($records))
{
echo "<tr>";
echo "<td>".$row["name"]."</td>";
echo "<td>".$row["email"]."</td>";
echo "<td>".$row["cellephone"]."</td>";
echo "<td>".$row["Subject"]."</td>";
echo "<td>".$row["message"]."</td>";
}
?>
   </table>
    <p>    
        <a href="logout.php" class="btn btn-danger">log Out here</a>
    </p>
</body>
  </article>
</section>
	<footer>
<div class="row">
  <div class="column">
    <img src="fb.jpg" alt="jseck fb" style="width:22%"><p>joseck nyachoti</p>
  </div>
  <div class="column">
    <img src="ln.jpg" alt="joseck ln" style="width:37%"><p>jose sajo</p>
  </div>
  <div class="column">
    <img src="insta.jpg" alt="joseck.insta" style="width:21%"><p>Nychoti_josecka</p>
  </div>
  <div class="column">
    <img src="t.jpg" alt="joseck.t" style="width:35%"><p>@nyachotijoseck</p>
  </div>
</div>
<small><i>Copyright &copy; terms and conditions apply @nyachotijoseck sep 2019</i></small>
</footer>
</html>

