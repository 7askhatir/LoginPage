<?php
session_start();
$Datum = $_SESSION['Email'] ?? "";
if(strlen($Datum)<=1)
{
header("Location:loginForm.php");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewsLetters Homme</title>
    <link rel="stylesheet" href="./style/navbar-footer.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div id="total">
    <div id="body">
    <nav>
        <label class="logo">NewsLetters</label>
        <ul>
            <li><a class="active" href="./Navbar.php">Homme</a></li>
            <li><a href="./ListEmail.php">List Email</a></li>
            <li><a href="./Message.php">Message</a></li>
            <li>
            <form action="login.php" method="post">
                <input name="dec" type="submit">
                </form>
        </li>
        </ul>
    </nav>

    <section>   

        <img class="img" width="1525px" src="./assert/ecran news letters.png"/>
   
    </section>
</div>
</div>

<!--footer-->
<div class="dfo">
<footer class="footer-distributed">

<div class="footer-left">
    <h3>Rh<span>Competence</span></h3>

    <p class="footer-links">
        <a href="#">Home</a>
        |
        <a href="./ListEmail.php">List Email</a>
        |
        <a href="./Message.php">Message</a>
    </p>
    <p class="footer-company-name">Copyright © 2022 <strong>Rh-Competence</strong> All rights reserved</p>
</div>

<div class="footer-center">
    <div>
        <i class="fa fa-map-marker"></i>
        <p><span>1er étage, 180 Rue Ibnou Faris </span>
        Casablanca 20300</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>+212 661 778 601 – +212 529 959 558</p>
    </div>
    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:sagar00001.co@gmail.com">info@rhcompetence.com </a></p>
    </div>
</div>
<div class="footer-right">
    <p class="footer-company-about">
        <span>About the company</span>
        <strong>RH & COMPETENCE</strong> se démarque par une expérience de plus de 15 ans sur le marché de la Formation et de l’Accompagnement humain, une expertise certifiée de ses ressources ( Consultants, Formateurs, Coachs) et surtout par une démarche basée sur l’écoute de l’évolution du marché, du besoin client et un engagement total pour répondre aux défis qui nous sont soumis.
    </p>
</div>
</footer>
</div>
</body>
</html>