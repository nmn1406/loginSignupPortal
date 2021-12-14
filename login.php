<?php
session_start();
if(isset($_SESSION['name'])){
    header("Location: home.php");
}
function dologin(){
    include 'dbConnection.php';
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $sql = "SELECT * FROM user where email='$email' AND password='$pwd'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        header("Location: home.php");
    }
    else {
        return "Invalid Email/Password";
    }

    $conn->close();
}

if(isset($_POST['login'])){
    dologin();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<form class="box" name="dologin" METHOD="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<h1>Login</h1>

<input type="text"Name="email" required placeholder="Enter Email...">
<input type="password" Name="pwd" required placeholder="Enter Password...">
<span class='error-message'>
    <?php
    if(isset($_POST['login'])){
        echo dologin();
    }
    ?>
</span>
<input type="submit" name="login" value="Login">
<a href="index.php" class="home">Home</a>
<a href="forgotPassword.php" class="forgot_password">Forgot Password</a>
<a href="signup.php" class="signup_link">Sign Up</a>
</form>

</body>
</html>
