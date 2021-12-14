<?php
    session_start();
    if(!isset($_SESSION['name'])){
        header("Location: login.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="script.js"></script> -->
</head>
<body>
    <h2>Do You really want to delete your account: 
        <?php echo $_SESSION['email']; ?>
    </h2>
    <form name="deleteAccount" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="password" name="pwd" placeholder="Enter your password..">
        <input type="submit" name="delete" value="Delete" id="delete">
        <script>
            document.getElementById("delete").addEventListener("click", function(event){
  event.preventDefault()
});
        </script>
    </form>
</body>
</html>

<?php

?>