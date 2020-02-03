<DOCTYPE html>

<html lang="en">
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
<image src="josec.jpg"style="float:right;width:370px;height:370px">
</div>
<article> 


<h2>Fill in the details below to contact me</h2>
<p><span class="error">*you must feel in every details</span></p>
<form method="POST" action="dbConnection.php">  
  Name: <input type="text" name="name" required >
 <br><br>
  E-mail: <input type="text" name="email" required >
  <br><br>
  Cellephone: <input type="text" name="cellephone" required >
  <br><br>
  Subject: <input type="text" name="Subject" required >
  <br><br>
  Message: <textarea name="message" rows="1" cols="20"></textarea required>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</article>
</section>
<footer>
<div class="footer">
<div class="row">
  <div class="column">
    <img src="fb.jpg" alt="joseck fb" style="width:22%"><p>joseck nyachoti</p>
  </div>
  <div class="column">
    <img src="ln.jpg" alt="joseck ln" style="width:37%"><p>jose sajo</p>
  </div>
  <div class="column">
    <img src="insta.jpg" alt="joseck.insta" style="width:21%"><p>Nychoti_joseck</p>
  </div>
  <div class="column">
    <img src="t.jpg" alt="joseck.t" style="width:35%"><p>@nyachotijoseck</p>
  </div>
</div>
<small><i>Copyright &copy; terms and conditions apply @nyachotijoseck sep 2019</i></small>
</div>
</footer>
</html>