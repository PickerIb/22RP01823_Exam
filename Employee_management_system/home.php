<?php
session_start();
require("connect.php");
if(!isset($_SESSION['username'])){
    header("location:index.php");
    exit();
}
$username=$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXTECH</title>

    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>

    <fieldset style="width:800px;">
        <legend>
            <h2>WELCOME TO EMPLOYEE MANAGEMENT SYSTEM</h2>
        
            </legend>
            <p>You logged in as    <b><?php  echo $username ?></b> </p>
      <button><a href="addemployees.php">ADD NEW EMPLOYEE EMS</a></button><br><br>
      <button><a href="viewemployees.php">VIEW EMPLOYEE IN EMS </a></button><br>
    </fieldset><br>
<button><a href="logout.php" style="text-decoration: none; color: black;">LOGOUT</a></button>
</body>
</html>