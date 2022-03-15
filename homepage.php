<!DOCTYPE html>
<link rel="stylesheet" href ="homepage.css">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <title>AG Company</title>
    </head> 
    <body>
<div class="banner">
    <div class="navbar">
      <div class="logoja">
        <ul>
            <a href="homepage.php">
        <img src="logo.png" class="logo">
    </ul> </a>
</div>
    <div class="navbari">
        <ul>
        <li><a href="homepage.php"><b>Ballina</b></a></li>
        <li><a href="contact.html"><b>Kontaktoni</b></a></li>
        <li> <a href="dashboard.php"><b>Dashboard<b></a></li>
        <li> <a href="?action=logout"><b>Logout<b></a></li>
        <li></li>

</ul>
    </div>
    </div>
    <div class="ballina">
    <div class="content">
        <h1>Krijoni Websiten Tuaj!</h1>
        <p><b>Filloni tani dhe perfitoni deri ne 50% zbritje</b></p>

    <div>
        <a href="register.php">
       <button type="button"><span></span> Filloni Tani</button>
    </a>
    <a href ="#01">
       <button type="button"><span></span> Puna Jonë</button>
    </a>


    <div class="word" id="01">
<h2>Rreth nesh?</h2>
<p>AG Company daton që nga 21 janar 2022. U themelua nga një student, pasionant i teknologjisë. Merrweb numëron 4 pjesëtarë në ekipin e tij.

WordPress dizajner

Web developer,

Grafik dizajner  dhe

Ekspert të SEO-së.

Ndonëse themeluar së fundmi, pjesëtarët e MerrWebit kanë punuar si freelancer me vite të tëra. Menduam: Pse mos ta hapim një agjencion dhe e hapëm.

Rikujtojmë thënien e famshme:

“Mënyra më e mirë për të filluar diçka është të ndaloni së foluri dhe ta bëni atë.”
Walt Disney.
….
Nëse edhe ju keni ndonjë ide, na kontaktoni. Takohemi, flasim dhe e zhvillojmë atë që e keni në mendje. .</p>

</div>
    </div>
</div>

</div>

</div>

<?php 

session_start();

    
if(isset($_COOKIE['is_logged_in'])) {
    if(isset($_COOKIE['user_email'])) {
        echo '<script>alert("Miresevini ne faqen AG Copmany")</script>' .$_COOKIE['user_email'] ." " .'<a href="?action=logout">Logout</a>';
        

    }
} else {
    header("Location: login.php");
}
if(isset($_GET['action'])) {
    if($_GET['action'] ===  'logout') {
        # delete sessions
        unset($_SESSION['user_email']);
        unset($_SESSION['is_logged_in']);
        session_destroy();

        # delete cookies
        setcookie("user_email", null, -1);
        setcookie("is_logged_in", null, -1);

        header("Location: login.php");
    }
}
?>

<footer>
    <p>Punoi: Gentuar Lushtaku<br>
    <a href="www.agcompany.com">AG Copmany</a></p>
  </footer>

    </body>
</html>

