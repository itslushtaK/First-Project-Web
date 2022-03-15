<?php 
session_start();
include "db.php";

// print_r($mysqli);


function is_email($email) {
    if(preg_match("/[\w\.\_\-]+\@agcompany.(com|net)/i", $email) == 0) 
        return false;

    return true;
}

$errors = [];

if(isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if( isset($email) && !empty($email) && isset($password) && !empty($password) ) {
        if(is_email($email)) {
            $sql = "SELECT * FROM `users` WHERE `email`='$email'";
            if($result = $mysqli->query($sql)) {
                if($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    if(password_verify($password, $row['password'])) {
                        $_SESSION['user_email'] = $email;
                        $_SESSION['is_logged_in'] = true;
                        setcookie("user_email", $_SESSION['user_email'], time()+120);
                        setcookie("is_logged_in", $_SESSION['is_logged_in'], time()+120);
    
                        header("Location: homepage.php");
                    } else {
                        $errors[] = "Password is incorrect!";
                    }
                } else {
                    $errors[] = "User doesn't exist!";
                }
            } else {
                $errors[] = "Login faild!";
            }
        } else {
            $errors[] = "Email is not valid!";
        }
    } else {
        $errors[] = "All fields are required!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PHP</title>
</head>
<body>
<body>
        
       
        <div class="banner">
            <div class="navbar">
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
                    <li><a href="contact.php"><b>Kontaktoni</b></a></li>
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
    <?php
        echo "<ul>"; 
        if(count($errors)) {
            foreach($errors as $error) {
                echo "<li span style='text-align:center; color:red;'>$error</li>";
            }
        }
        echo "</ul>";
    ?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <input type="text" name="email" placeholder="Shkruaj emailin tuaj" />

    
  <div class="pw2">
    <input id="password" name="password" placeholder="Shkruaj Fjalkalimin" type="password"  >
  </div>
<div class="buton">
  <button  name="login_btn" type="submit" id="demo" ><span></span>Submit</button>
</div>
  
<div class="regjistohu">
  <h3>Nuk jeni regjistruar?   <a href="register.php">Regjistrohu</a></h3>

                </div>
              </form>

    </body>
</html>