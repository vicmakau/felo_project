<?php
session_start();

 $connection = new mysqli('localhost', 'root', '', 'school_db');

$mail = $pass = $error = "";

if(isset($_GET['msg'])){
  $loginMsg = $_GET['msg'];
}

if(isset($_POST['login'])){
  $mail = $_POST['email'];
  $pass = md5($_POST['pass']);

  if(empty($mail))
    $error = "Enter your email address";
  elseif(empty($pass))
    $error = "Enter your password";

  $checkCredentials = "SELECT email, password FROM students_tbl WHERE email = '$mail' AND password = '$pass'";
  $executeCheckCredentials = mysqli_query($connection, $checkCredentials);

  $checkUser = mysqli_num_rows($executeCheckCredentials);

  if($checkUser == 0)
    $error = "invalid credentials. Try again or signup.";
  elseif($checkUser == 1){
    $_SESSION['user_email'] = $mail;
    header('location:index.php');
  }


}

require_once('header.php');

?>
<div class="container">
<div class="row">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-6">
    <div id="loginForm">
      <?php

        if($error !== '')
          echo "<div class = 'alert alert-danger'>".$error."</div>";

        if(isset($loginMsg)){
          echo "<div class = 'alert alert-info'>".$loginMsg."</div>";
        }
      ?>
      <form method="POST" action="login.php">
        <p><input class = "form-control" type="email" name="email" placeholder="enter your email address"></p>
        <p><input class = "form-control" type="password" name="pass" placeholder="enter your password"></p>
        <p><button class="btn btn-info" type="submit" name="login" >Login</button></p>
      </form>
    </div>
  </div>
</div>

  </div>