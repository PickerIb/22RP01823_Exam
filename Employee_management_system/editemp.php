<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
    exit();
    
}
require("connect.php");

$id=$_GET["id"];

$retrieve=(mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM employees WHERE id='$id'")));

$employee_names=$retrieve['employee_name'];
$emails=$retrieve['email'];
$phones=$retrieve['phone'];
$positions=$retrieve['position'];
$addres=$retrieve['address'];
$dates=$retrieve['created_at'];
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
            <h2>MODIFY EMPLOYEES IN  A SYSTEM</h2>
            </legend>
        <label for="">Employee Name:</label><br>
        <input type="text" name="empn" value="<?php echo $employee_names ?>" ><br>
        <label for="">Email:</label><br>
        <input type="email" name="email" value="<?php echo $emails ?>"  ><br>
        <label for="">Phone:</label><br>
        <input type="text" name="phone" value="<?php echo $phones ?>"  ><br>
        <label for="">Position:</label><br>
        <input type="text" name="post" value="<?php echo $positions ?>"  ><br>
        <label for="">Address:</label><br>
        <input type="text" name="addr" value="<?php echo $addres ?>"  ><br>
        <label for="">Date:</label><br>
         <input type="datetime-local" name="date" value="<?php echo $dates ?>"  ><br><br>
        <input type="submit" name="change" value="SAVE CHANGES"><br>
      
    </fieldset>
    
    <a href="home.php" style="text-decoration:none;">BACK TO HOME</a>
    </form>
</body>
</html>


<?php

if(isset($_POST['change'])){

    $employee_name = trim($_POST['empn']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST['phone']);
    $position = trim($_POST['post']);
    $address = trim($_POST['addr']);
    $date = $_POST['date'];

    $errors = [];


     //Employee name valid...
     if(empty($employee_name)){
        $errors[]="Name is required";
    }
    elseif (!preg_match("/^[a-zA-Z ']*$/",$employee_name)){
        $errors[]="Only letters and whitespace allowed in employee name";
    }

   //email valid...
    if(empty($email)){
        $errors[]="Email is required";
    }
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]="Invalid email format";
    }


    //phone vali...
    if(empty($phone)){
        $errors[]="Phone is required";
    }
    elseif (!preg_match("/^[0-9]{10}$/",$phone)){
        $errors[]="Phone must be valid and have 10 number ";
    }
    //for position validation
    if(empty($position)){
        $errors[]="Position is required";
    }

    //for address validation
    if(empty($address)){
        $errors[]="Address is required";
    }
    
    //for date validation

    if(empty($date)){
        $errors[]="Date is required";
    }
    
    if(empty($errors)){
    



$changedata=mysqli_query($conn,"UPDATE employees set employee_name='$employee_name',email='$email',phone='$phone',position='$position',address='$address',created_at='$date' WHERE id='$id'");


if($changedata){

    ?>
    <script>
        alert("Employee records changed well");
        window.location.href="viewemployees.php";
    </script>
    <?php
}
else{

    ?>
    <script>
        alert("Failed to  modify Employee Record ");
        window.location.href="editemp.php";
    </script>
    <?php
 
}

}
else{

    foreach($errors as $error){
        echo"<p style='color:red;'>$error</p>";
    }
 }
}


?>