<?php
session_start();
require("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXTECH</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <fieldset style="width:500px;">
        <legend>
            <h2>LOGIN HERE</h2>
            </legend>
        <label for="">Username:</label><br>
        <input type="text" name="usern" placeholder="Enter your username" required><br>
        <label for="">Password:</label><br>
        <input type="password" name="passw" placeholder="Enter your password" required><br><br>
        <input type="submit" name="login" value="LOGIN"><br>
        <input type="checkbox" name="remember">Remember Me
        
    </fieldset>
    </form>
</body>
</html>


<?php

if(isset($_POST['login'])){

$username=$_POST['usern'];
$password=$_POST['passw'];


$retrieve=mysqli_query($conn,"SELECT *from users WHERE username='$username'");

$count=mysqli_num_rows($retrieve);

$fetch=mysqli_fetch_array($retrieve);

if($count==0){
?>

<script>
    alert("Unknown username");
    window.location.href="index.php";
</script>
<?php
}

else {
    if($username == $fetch['username'] && $password == $fetch['password']){

        $cookie_name="username";
        $cookie_values=$username;
        $cookie_expiration=time () + (7*24*60*60);
        setcookie($cookie_name,$cookie_values,$cookie_expiration);
        if(isset($_COOKIE[$cookie_name]) && $_POST['remember']){
            $cookie_values=$username;
        }
        $_SESSION['username'] = $username;
        header("location:home.php");
    }
    else{
        ?>

        <script>
            alert("Invalid password of username");
            window.location.href="index.php";
        </script>
        <?php  
    }
}

}



?>