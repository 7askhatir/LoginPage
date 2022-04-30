<?php
session_start();
if(isset($_POST['dec'])){
  
  unset($_SESSION['Email']);
   header('location:loginForm.php');
}

if (isset($_POST['submit']))
{
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $db = new mysqli('localhost','root','','loginsysteme');

  $sql = "SELECT * FROM user where email = '$email' ";
  $result = $db->query($sql);
  if($result->num_rows > 0)
  {
      $data = $result->fetch_all(MYSQLI_ASSOC);
      if($data[0]['password']==$pass){
        $_SESSION['Email']=$email;
        header('location:Navbar.php');
      }
      else{
        echo "PassWord Incorect";
      }
  }
  else
  {
     echo "Email Not Fond";
  }
} 

?>