<?php
session_start();
include 'db.php';

?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="teDhenat.css">
    <title>Lista e te dhenave</title>
  
</head>
<body>
<div class="input">
    <a href="input.php">
       <button type="button"><span></span> Shto Usera</button>
    </a>
</div>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Data</th>
            <th></th>
</tr>
</table>
<table>
   <?php
  if(isset($_COOKIE['is_logged_in'])) {
    if(isset($_COOKIE['user_email'])) {
        

    }
}
   $sql="SELECT * FROM users;";
   $result = mysqli_query($conn , $sql);
   $resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
$id = $row['id'];
$email = $row['email'];
$created_ad =$row['created_ad'];
echo ' <tr> 
<td>'.$id.'</td>
<td>'.$email.'</td>
<td>'.$created_ad.'</td>
<td>
<button type="button" class="btn" ><a href="delete.php? deleteid='.$id.'">DELETE</a></button>
</td>
</tr>';
    }
}

?>


    
</table>
</body>
<html>