<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
    exit();
    
}
require("connect.php");


if(isset($_POST['add'])){

    $employee_name=trim($_POST['empn']);
    $email=filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
    $phone=trim($_POST['phone']);
    $position=trim($_POST['post']);
    $addre=trim($_POST['addr']);
    $date=$_POST['date'];
    
    
    $errors=[];
    
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
    if(empty($addre)){
        $errors[]="Address is required";
    }
    
    //for date validation

    if(empty($date)){
        $errors[]="Date is required";
    }
    
    if(empty($errors)){
    
    $indata=mysqli_query($conn,"INSERT INTO employees values(null, '$employee_name', '$email', '$phone', '$position','$addre', '$date')");
    // $stmt = $conn ->prepare("INSERT INTO employees (employee_name,email,phone,position,address,created_at) VALUES (?,?,?,?,?,?)");
    // $stmt->bind_param($employee_name,$email,$phone,$position,$addre,$date);
    
    if($indata){
    
        ?>
        <script>
            alert("Employees Recorded Successful");
            window.location.href="viewemployees.php";
        </script>
        <?php
    }
    else{
    
        ?>
        <script>
            alert("Failed to Record Employees");
            window.location.href="addemployees.php";
        </script>

        <?php
        $stmt->close();
     
    }
    
    }

    else{

        foreach($errors as $error){
            echo"<p style='color:red;'>$error</p>";
        }
    }
}
$conn->close();
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
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <fieldset style="width:500px;">
        <legend>
            <h2>ADD EMPLOYEES IN  A SYSTEM</h2>
            </legend>
        <label for="">Employee Name:</label><br>
        <input type="text" name="empn" ><br>
        <label for="">Email:</label><br>
        <input type="email" name="email" ><br>
        <label for="">Phone:</label><br>
        <input type="text" name="phone" ><br>
        <label for="">Position:</label><br>
        <input type="text" name="post" ><br>
        <label for="">Address:</label><br>
        <input type="text" name="addr" ><br>
        <label for="">Date:</label><br>
         <input type="datetime-local" name="date" ><br><br>
        <input type="submit" name="add" value="ADD EMPLOYEE"><br>
      
    </fieldset>
    
    <a href="home.php" style="text-decoration:none;">BACK TO HOME</a>
    </form>
</body>
</html>
