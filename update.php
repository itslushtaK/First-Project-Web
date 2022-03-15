<?php
include ("db.php");

error_reporting(0);
$id=$_GET['id'];
$em =$_GET["email"];
$cd = $_GET['cd'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="register.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Register - PHP</title>
</head>
<body>
<div class="banner">
        <div class="navbar">
          <div class="logoja">
            <ul>
            <a href="homepage.php">
              <img src="logo.png" class="logo">
          </ul>
      </a>
    </div>
        <div class="navbari">
     
        
    </ul>
        </div>
        </div>
            <div class="imgcontainer">
                <a href="homepage.php">
                <img src="logo.png" alt="logo" class="logo">
            </a>
    
        </div>
    <h2 style="text-align:center; color:white;" >Ndysho te dhenat</h2>
   
    <form method="GET" action="">
    <div class="emri2">
    <p>Email</p>
    <input type="email" name="email" value="<?php echo "$em" ?>" placeholder="Shtyp emailin tuaj" />
        <br /><br />
    </div>
    <p style="text-align:center;">Password</p>

    <div class ="email">
        <input type="password"  name="password" placeholder="Shtyp passwordin " />
        <br /><br />
    </div>
    <div class="password">
    <p>Confrim Password</p>
        <input type="password"  name="confirm_password" placeholder="Konfirmo passwordin" >
        <br /><br />
    </div>
    
<div class="btn">
    <button style="te" type="submit" name="register_btn"><span></span>Register</buton>
    </div>      
   
    </form>
</body>
</html>