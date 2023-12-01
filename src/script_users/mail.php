<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("../../vendor/autoload.php");

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

     
    if (empty($name) || empty($email) || empty($message) ) {
        echo "Invalid input. Please fill in all fields with valid data.";
        exit;
    }
    else if(!preg_match('/[A-Za-z\s]/',$name)){
        echo "name invalid";
        exit;
    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "email invalid";
        exit;
    }else if(strlen($message)<30){
        echo "it must contain more than 30 car";
        exit;
    }

    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->Username = 'simotergui4@gmail.com';
        $mail->Password = '5450 5623';

        $mail->setFrom($email, $name);
        $mail->addAddress('simotergui4@gmail.com','peaple per task');
        $mail->Subject = "Hey, this is a test";
        $mail->Body = $message;

        $test = $mail->send();

        if ($test) {

            echo "Email sent successfully!";
            header("Location:../contact.php");
        } else {
            echo "Error sending email. Check your error logs for details.";
        }
    } catch (Exception $e) {
        echo "An error occurred: {$mail->ErrorInfo}";
    }
}
?>




