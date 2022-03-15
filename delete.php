<?php
include "db.php";
if(isset($_GET['deleteid'])){
    $id =$_GET['deleteid'];


    $sql ="DELETE FROM `users` WHERE id=$id";
$result=mysqli_query($conn , $sql);
if($result){
    header('Location: dashboard.php');
    echo "<script>alert('Deleted');</script>";   

}
    else{
    echo "error";
}

}