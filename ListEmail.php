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
    <title>NewsLetters List-Email</title>
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
            <li><a href="#">List Email</a></li>
            <li><a href="./Message.php">Message</a></li>
        </ul>
    </nav>
</div>
</div>
   <!--Logo-->
    <h1> <img src="./assert/email (1).png" width="50px"/> <u>NewsLetters </u> <img src="./assert/paper-plane.png" width="50px"/></h1>
    
    <hr>
    
    <br/>
  <!--Ajouter Email-->
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <pre>
<label> <img src="./assert/email.png" width="30px"/></label>  <input type="email" name="email" id="d1" placeholder="EMAIL "/>                                          <label> <img src="./assert/full name.png" width="30px"/></label>  <input name="name" type="text" id="d2" placeholder="FULL NAME" /> 

<button id="button1" name="add">Add </button>

</pre>
</form>
<?php
if (isset($_POST['add'])) {
    // collect value of input field
    $email = $_POST['email'];
    $name=$_POST['name'];
    if (empty($email) || empty($name)) {
      echo "Name or Email is empty";
    } else {
        $insert="INSERT INTO `user` (`ID`, `EMAIL`, `NOM`) VALUES (NULL, '".$email."', '".$name."');";
        if ($conn->query($insert) === TRUE) {
            echo "Created successfully";
          } else {
            echo "Error: " . $insert . "<br>" . $conn->error;
          }
          
    }
  }
?>
<br/>
<br/>
<!--table-->
<table border="1" width="1000px" >
    <thead>
    <tr id="tr1">
        <th>Id</th>
        <th>E-mail</th>
        <th>Full Name</th>
        <th>State</th>
    </tr>
</thead>
    <tbody>
    <?php
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo '<tr>
            <td >'.$row["ID"].'</td>
            <td>'.$row['EMAIL'].'</td>
            <td>'.$row['NOM'].'</td>
            <td>
            <form action="'. $_SERVER['PHP_SELF'] .'" method="post">
            <input  class="btn" type="submit" name="delete" value="Supprimer">
            <input type="hidden" name="vin" value="'.$row['ID'].'">
            </form>
            </td>

        </tr>';
          }
        } else {
          echo "0 results";
        }
        if(isset($_POST['vin']))
            {
             
              $delet =" DELETE FROM `user` WHERE ID='".$_REQUEST['vin']."' ";
              if ($conn->query($delet) === TRUE) {
                  echo "Delet successfully";
                  header("Refresh:0; url=index.php");
                }
            }
    ?>
    
</tbody>
</table><br/>
<br/>

<!--footer-->
<div class="dfo">
<footer class="footer-distributed">

<div class="footer-left">
    <h3>Rh<span>Competence</span></h3>

    <p class="footer-links">
        <a href="./Navbar.php">Home</a>
        |
        <a href="#">List Email</a>
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
