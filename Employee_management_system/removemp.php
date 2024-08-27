<?php
require("connect.php");

$id=$_GET["id"];

$retrieve=mysqli_query($conn,"SELECT * FROM employees WHERE id='$id'");


if(mysqli_num_rows($retrieve)>0){


$del=mysqli_query($conn,"DELETE FROM employees WHERE id='$id'");

if($del){
?>
<script>
    alert("Record Deleted Successfully")
    window.location.href="viewemployees.php";
</script>
<?php
}
else{
    ?>
    <script>
        alert("Failed to Delete a Record")
        window.location.href="viewemployees.php";
    </script>
    <?php   
}

}

else{
    ?>
    <script>
        alert("Record you're trying to delete is already deleted not found ");
        window.location.href="viewemployees.php";
    </script>
    <?php 


}




?>

