<!DOCTYPE html>
<html lang="en">
<head>
  <title>School System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 -->
  <style>
    
    
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Kisumu Schools</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Branches<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Kisumu town</a></li>
            <li><a href="#">Maseno</a></li>
            <li><a href="#">Luanda</a></li>
          </ul>
        </li>
        <li><a href="about.php"> About</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <?php
          if(isset($_SESSION['user_email']))
            echo "<li><a href='student_profile.php''>Profile</a></li>";
          else
            echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
          ?>
        

      </ul>
    </div>
  </div>
</nav>
  
</body>
</html>
