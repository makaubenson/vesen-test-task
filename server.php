<?php
ob_start();
session_start();

// connect to the database
try {
  $db = mysqli_connect('localhost', 'benson', 'benson', 'vesen');
//   echo 'Database Connection Successfull';
} catch(Exception $e) {
  echo 'Database Connection Failed.';
}

$errors = array();

//submit details
if (isset($_POST['submit-btn'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $phone= $_POST['user_phone'];
  
    //php data validation
    if (empty($name)) {
      array_push($errors, "Please enter your name");
    }
    if (empty($email)) {
      array_push($errors, "Please enter your email");
    }
    if (empty($phone)) {
      array_push($errors, "Please enter your phone");
    }

//if no errors
    if (count($errors) == 0) {
  
      $submit_dt_query = "INSERT INTO `users`(`name`, `email`, `phone`) VALUES ('$name','$email','$phone')";
      $results = mysqli_query($db, $submit_dt_query);
  
      //reload to home.php if successfull
        header('location: ./home.php');
      }else{

        //if operation fails, remain in index.php and render an error
        array_push($errors, "Error!:Unable to submit details");
        header('location: ./index.php');
      }
    }
?>