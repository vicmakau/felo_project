<?php
session_start();
function clean_data($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
}

$fname = $lname = $mail = $phone = $date = "";
$formError = '';
$_SESSION['formErr'] = '';

if(isset($_POST['signup'])){
    $fname = $_POST['firstName'];
    $lname =  $_POST['lastName'];
    $mail = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    if(empty($fname)){
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

    if($formError == ''){
        $connection = new mysqli('localhost', 'root', '', 'school_db');
        if(!$connection)
            echo 'not connected to db';

        else{

            $sendData = "INSERT INTO students_tbl(firstName, lastName, phoneNumber, email, dob) VALUES ('$fname', '$lname', '$mail', '$phone', '$date')";
            $executeSendData = mysqli_query($connection, $sendData);

            if($executeSendData)
                echo 'student added successfully';
            else
                echo 'problem adding student';
        }
    }
    else{
        $_SESSION['formErr'] = $formError;
        header('location:registration.php');

    }


}
?>