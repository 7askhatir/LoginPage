<?php require './pages/connect.php' ?>
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
    <title>NewsLetters Message</title>
    <link rel="stylesheet" href="./style/NewsLet.css">
    <link rel="stylesheet" href="./style/navbar-footer.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body >
    <!--NavBar-->
    <div id="total">
    <div id="body">
    <nav>
        <label class="logo">NewsLetters</label>
        <ul>
            <li><a class="active" href="./Navbar.php">Homme</a></li>
            <li><a href="./ListEmail.php">List Email</a></li>
            <li><a href="#">Message</a></li>
        </ul>
    </nav>
</div>
</div>
    <!--Logo-->
<h1> <img src="./assert/email (1).png" width="50px"/> <u>NewsLetters </u> <img src="./assert/paper-plane.png" width="50px"/></h1>
    
    <hr>
    
    <br/>
    <!--Message-->
<fieldset width="50px">
    <br/>
    <form  method="post">
    <label> <img src="./assert/name.png" width="30px"/></label>
<input type="text" id="d3" name="from" required="required" placeholder="NAME"/><br/><br/>
     <label> <img src="./assert/OBJET.png" width="30px"/></label>
<input  id="d4" required="required" name="objet" placeholder="OBJET"/><br/><br/>
     <label> <img src="./assert/message.png" width="30px"/></label>
<textarea name="text" cols="50" rows="10" required="required" placeholder="MESSAGE" ></textarea><br/><br/>
<button id="button2" name="send"> Send </button>
    </form>
<br/>
</fieldset>
<?php
if (isset($_POST['send'])){
    $from = $_POST['from'];
    $obj=$_POST['objet'];
    $text = $_POST['text'];
    if(!empty($from) && !empty($obj) && !empty($text)){
        require_once './pages/mail.php';
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $mail->setFrom('chrimrtah35@gmail.com', $from);
            while($row = $result->fetch_assoc()) {
                
                $mail->addAddress($row['EMAIL']);
                
              }
              
            $mail->Subject = $obj;
                $mail->Body    = $text;
                $mail->AltBody = $text;
                $mail->send();
            
          } else {
            echo "0 results";
          }
    }
}


?>

<!--footer-->
<div class="dfo">
<footer class="footer-distributed">

<div class="footer-left">
    <h3>Rh<span>Competence</span></h3>

    <p class="footer-links">
        <a href="./Navbar.php">Home</a>
        |
        <a href="./ListEmail.php">List Email</a>
        |
        <a href="#">Message</a>
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