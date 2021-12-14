<?php
session_start();
if(isset($_SESSION['name'])){
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form class="box" name="dosignup" METHOD="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<h1>Sign Up</h1>

<input type="text"Name="email" required placeholder="Enter Email...">
<input type="password" Name="pwd" required placeholder="Enter Password...">
<input type="password" Name="repwd" required placeholder="Re-enter Password...">
<span class="error-message">
    <?php
    if(isset($_POST['submit'])){
       echo doSignup();
    }
    ?>
</span>
<input type="submit" name="submit" value="Sign Up">
<a href="index.php" class="home">Home</a>
<a href="login.php" class="login_link">Login</a>
</form>
</body>
</html>
<?php
function doSignup(){
    include 'dbConnection.php';
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $sql = "INSERT INTO user (email, password) VALUES ('$email', '$pwd')";
    if($conn->query($sql) === TRUE){
	    return "User registered. Please login";
    }
    else {
        return "Unknown error occured.<br> Please try again.". $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

if(isset($_POST['submit']))
{
	doSignup();
}
