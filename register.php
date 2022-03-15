<?php 
session_start();
include "db.php";

// print_r($mysqli);



function is_email($email) {
    if(preg_match("/[\w\.\_\-]+\@agcompany.(com|net)/i", $email) == 0) 
        return false;

    return true;
}
function is_password($password){
    if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $password)==0)
      return true;
    
    return false;

}
$errors = [];

if(isset($_POST['register_btn'])) {
    $email = $mysqli->escape_string($_POST['email']);
    $password = $mysqli->escape_string($_POST['password']);
    $confirm_password = $mysqli->escape_string($_POST['confirm_password']);

    if(isset($email) && !empty($email) && isset($password) && !empty($password) && isset($confirm_password) && !empty($confirm_password) ) {
        if(is_email($email)) {
        // if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if(is_password($password)) {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $confirm_password = password_hash($confirm_password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `users` (`email` , `password`) VALUES ('$email', '$password')";
                if($mysqli->query($sql)) {
                    $_SESSION['user_email'] = $email;
                    $_SESSION['is_logged_in'] = true;
                    setcookie("user_email", $_SESSION['user_email'], time()+120);
                    setcookie("is_logged_in", $_SESSION['is_logged_in'], time()+120);
                 

                    header("Location: homepage.php");
                } else {
                    $errors[] = "Regjistrimi deshtoi!";
                }
            } else {
                $errors[] = "Passwordet nuk jane te njejta";
            }
        } else {
            $errors[] = "Emaili nuk eshte valid!";
        }
    } else {
        $errors[] = "Duhet te plotesohen te gjitha fushat";
    }
}
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
            <ul>
            <li><a href="homepage.php"><b>Ballina</b></a></li>
            <li><a href="contact.html"><b>Kontaktoni</b></a></li>
            <li><a href="login.php"><b>Login</b></a></li>
            <li> <a href="register.php"><b>Regjistrohu</b></a></li>
</ul>
        
    </ul>
        </div>
        </div>
            <div class="imgcontainer">
                <a href="homepage.php">
                <img src="logo.png" alt="logo" class="logo">
            </a>
    
        </div>
    <h2 style="text-align:center; color:white;" >Regjistrohu</h2>
    <?php
        echo "<ul>"; 
        if(count($errors)) {
            foreach($errors as $error) {
                echo "<li span style='text-align:center; color:red;' > $error</li>";
            }
        }
        echo "</ul>";
    ?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div class="emri2">
    <p>Email</p>
    <input type="email" name="email" placeholder="Shtyp emailin tuaj" />
        <br /><br />
    </div>
    <p style="text-align:center;">Password</p>

    <div class ="password">
        <input type="password"  name="password" placeholder="Shtyp passwordin " />
        <br /><br />
    </div>
    <div class="password">
    <p>Confrim Password</p>
        <input type="password"  name="confirm_password" placeholder="Konfirmo passwordin" >
        <br /><br />
    </div>
    
<div class="emri2">
    <button style="te" type="submit" name="register_btn"><span></span>Register</buton>
    </div>      
    <div class=" h3">
          <h3>Keni nje account tani ? <a href="login.php">Log In</a></h3>
      </div>
    </form>
</body>
</html>