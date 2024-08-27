<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
    exit();
    
}
require("connect.php");

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

    <button><a href="addemployees.php" style="text-decoration:none;">ADD NEW EMPLOYEES</a></button>
    <fieldset style="width:900px;">
        <legend>
            <h2>ALL EMPLOYEES IN EMS </h2>
            </legend>
   <table border="1">
    <tr>
    <th>#</th>
    <th>EMPLOYEE NAME</th>
    <th>EMAIL</th>
    <th>PHONE</th>
    <th>POSITION</th>
    <th>ADDRESS</th>
    <th>CREATION TIME</th>
    <th colspan="2">ACTIONS</th>
    </tr>
    <?php
     $n=1;
     $retrieve=mysqli_query($conn,"SELECT * FROM employees");
     $count=mysqli_num_rows($retrieve);
     while($getdata=mysqli_fetch_array($retrieve)){
?>

<tr>
   
<td> <?php echo $n?> </td>
<td> <?php echo $getdata['employee_name']?> </td>
<td> <?php echo $getdata['email']?> </td>
<td> <?php echo $getdata['phone']?> </td>
<td> <?php echo $getdata['position']?> </td>
<td> <?php echo $getdata['address']?> </td>
<td> <?php echo $getdata['created_at']?> </td>
<td><button><a href="editemp.php?id=<?php echo $getdata['id']?>"  >EDIT</a></td></button>
<td><button><a href="removemp.php?id=<?php echo $getdata['id']?>" onclick="return confirm('Are you sure do you want to delete this record')">REMOVE</a></button></td>
</tr>
<?php
$n++;
     }
    ?>
    
   </table>
      
    </fieldset><br>
    
    <button><a href="home.php" style="text-decoration:none;">BACK TO HOME</a></button>
    </form>
</body>
</html>


<?php

if(isset($_POST['add'])){

$employee_name=$_POST['empn'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$position=$_POST['post'];
$addre=$_POST['addr'];
$date=$_POST['date'];


$indata=mysqli_query($conn,"INSERT INTO employees values(null, '$employee_name', '$email', '$phone', '$position','$addre', '$date')");


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
 
}

}

?>