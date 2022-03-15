<?php
include "db.php";
?>
<!DOCTYPE html>
<html>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <head>
        <title>
            Kontaktoni
        </title>
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
            </div>
                <h2>Sugjerimet tuaja</h2>
               
      
                  <div class="emri2">
                    <input id="name" name="name" minlength="10" placeholder="Shkruaj Emrin dhe Mbiemrin" type="text" required >
                  </div>
                  <div class="email">
                <input type="email"  id="email" name="email" required placeholder="Shkruani Emailin" required>
              </div>
                 <div class="message">
                    <input id="message" name="message" placeholder="Shkruaj Mesazhin" type="message" required  >
                  </div>
                <div class="buton">
                  <button  type="submit" id="demo" onclick="myFunction()"><span></span>Submit</button>
                </div>
         
        

                <script>
                  
                function myFunction() {
                 
                  alert("Faleimderit per meazhin tuaj");
                }
                </script>
    
    </body>
</html>