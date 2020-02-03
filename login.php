
 <?php
// Initialize the session
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['password']))
 echo "<p>" . $_SESSION['id'] . " " . $_SESSION['username'] . " is a " . $_SESSION['password'] . "</p>"; 
 
// Check if the user is already logged in, if yes then redirect him to welcome page


 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM userss WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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
<li><a href="Contact me.php">Contact me</a></li>
<li><a href="login.php">Login</a></li>
</ul>
</nav>
<div class="media">
<image src="jose.jpg"style="float:right;width:370px;height:370px">

</div>
  
  <article>
    <h1>Login Page</h1>    
    <div class="wrapper">
        <h2>Login</h2>
         <p>Please fill in your credentials to login.</p>
        <form border=1 cellpadding=1 text-color=red
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label><br><br>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>  <br><br>  
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label><br><br>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group"><br><br>
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Already have an account? <a href="register.php">Register here</a>.</p>
        </form>
    </div>    
</section>
</article>
</body>
<footer>
<div class="row">
  <div class="column">
    <img src="fb.jpg" alt="jseck fb" style="width:22%"><p>joseck nyachoti</p>
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
</footer>

</html>
