<?php
ob_start();
session_start();

//require FPDf library
require_once('fpdf/fpdf.php');

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

    //print data
    if (isset($_POST['print-user-details-btn'])) {
        $user_email = $_POST['user_email'];
      
        //php data validation
        if (empty($user_email)) {
          array_push($errors, "Invalid email");
        }

    //if no errors
        if (count($errors) == 0) {

        // Create a new FPDF object
        $pdf = new FPDF();
            
        // Add a new page
        $pdf->AddPage();
        
        // Set the font and font size
        $pdf->SetFont('Arial','B',16);
        
        // Add a title
        $pdf->Cell(0,10,'User Details',1,1,'C');
        
        // Set the font size to 12
        $pdf->SetFont('Arial','',12);
        
        //get data from user, where button has been clicked
        $get_dt_query = "SELECT * FROM `users` WHERE email ='$user_email' ";
        $user_data_result = mysqli_query($db, $get_dt_query);
    
        // Loop through the results and add them to the PDF
        while ($row = mysqli_fetch_assoc($user_data_result)) {
            $pdf->Cell(50,10,$row['name'],1);
            $pdf->Cell(70,10,$row['email'],1);
            $pdf->Cell(70,10,$row['phone'],1);
        }
        
        // Output the PDF as a file download
        $pdf->Output('UserDetails.pdf', 'D');

// Exit the script to prevent any further output
exit();

          //reload to home.php if successfull
            header('location: ./home.php');
          }else{
    
            //if operation fails, remain in index.php and render an error
            array_push($errors, "Error!:Unable to print data");
            header('location: ./home.php');
          }
        }
?>