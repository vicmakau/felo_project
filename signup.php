<?php
session_start();
function clean_data($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
}

 $connection = new mysqli('localhost', 'root', '', 'school_db');
  if(!$connection)
            echo 'not connected to db';

$fname = $lname = $mail = $phone = $gender=$date = $profile_photo_name = "";
$formError = '';
$_SESSION['formErr'] = '';

if(isset($_POST['signup'])){
    $fname = $_POST['firstName'];
    $lname =  $_POST['lastName'];
    $mail = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $profile_photo_name = $_FILES['profile_photo']['name'];
    $folder = "profilePhotos/";
    $pass = $_POST['pw'];
    $conf_pass = $_POST['confpw'];

    /*if(empty($fname)){
        $formError = "Please enter your first name";
      }
    elseif(empty($lname)){
        $formError = "Please enter your last name";
    }
     elseif(empty($mail)){
        $formError = "Please enter your email address";
    }
     elseif(empty($phone)){
        $formError = "Please enter your phoneNumber";
    }
     elseif(empty($date)){
        $formError = "Please choose a date of birth";
    }
    elseif(empty($pass)){
      $formError= "Please choose a password";
    }
    elseif(strlen($pass) < 5){
      $formError = "Password must be at least 5 characters.";
    }
    elseif(empty($conf_pass)){
      $formError = "Please re-enter your password";
    }
    elseif($pass !== $conf_pass){
      $formError = "Sorry. Passwords do not match.";
    }*/

   /* $allowed_extensions = array('png','jpg', 'jpeg');

    if(!in_array(pathinfo($profile_photo_name),$allowed_extensions)){
      $formError = "File is not an image";
    }*/

    if($formError == ''){

            move_uploaded_file($_FILES['profile_photo']['tmp_name'], $folder.$profile_photo_name);

            $pass = md5($pass);
       
            $sendData = "INSERT INTO students_tbl(firstName, lastName, phoneNumber, email, dob, gender, photo_name, password) VALUES ('$fname', '$lname', '$phone', '$mail', '$date', '$gender', '$profile_photo_name', '$pass')";
            $executeSendData = mysqli_query($connection, $sendData);

            
            if(!$executeSendData)
                echo 'problem adding student';
            else
            {

                header("location:login.php?msg=Kindly login to proceed");
            }

        
    }

  }
    
  

require_once('header.php');

?>


<div class="container">
  <div class="row">
    <div class="col-lg-3">
    </div>
    <div id="signupForm" class="col-lg-6">

      <form action="signup.php" method="POST" enctype="multipart/form-data">
        <h4 style="color: blue">Enter your details below:</h4>

        <?php
           if($formError !== '')
            echo "<h6 style = 'color:red'>".$formError."</h6>";

        ?>
       
        <div class="form-group">
          <label>First Name:</label>
          <input type="text" class="form-control" name="firstName" value="<?php echo $fname; ?>" >
        </div>
        <div class="form-group">
          <label>Last Name:</label>
          <input type="text" class ="form-control" name="lastName" value="<?php echo $lname; ?>" >
        </div>
        <div class="form-group">
          <label>Phone Number:</label>
          <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div class="form-group">
          <label>Email:</label>
          <input type="email" class="form-control" name="email" value="<?php echo $mail; ?>">
        </div>
        <div class="form-group">
          <label>DOB:</label>
          <input type="date" class ="form-control" name="date" value="<?php echo $date; ?>">
        </div>
        
        			<div class="radio">
                <label><input type="radio" name="gender" value="male">Male</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="gender" value="female">Female</label>
              </div>
        <div class="form-group">	
          <label>Choose a profile photo:</label>	
        	<input type="file" class="form-control" name="profile_photo">
        </div>
        <div class="form-group">
          <label>Choose a password:</label>
          <input type="password" class="form-control" name="pw">
        </div>
        <div class="form-group">
          <label>Confirm Password:</label>
          <input type="password" class="form-control" name="confpw">
        </div>
        <button class="btn btn-primary" type="submit" name="signup">Signup</button>
      </form>

    </div>
   </body>
 </html>




























