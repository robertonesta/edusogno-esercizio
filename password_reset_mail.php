<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . "/Helpers/DB.php";
require 'vendor/autoload.php';


if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['password-reset-token']) && $_POST['email'])
{

    $connection = DB::connect();
    $emailId = $_POST['email'];

    $sql = "SELECT * FROM utenti WHERE email ='" . $emailId . "'";
    $statement = $connection -> prepare($sql);
    $statement -> execute();
    $result = $statement->get_result();
    
    //$result = mysqli_query($connection, "SELECT * FROM utenti WHERE email='" . $emailId . "'");
    
    //$row= mysqli_fetch_array($result);
    
    if($result->num_rows > 0)
    {    
        $token = md5($emailId).rand(10,9999);
        
        $expFormat = mktime(
            date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
        );
        
        $expDate = date("Y-m-d H:i:s",$expFormat);
        
        $update = mysqli_query($connection, "UPDATE `utenti` SET reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
        
        $link = "<a href='http://localhost/progetti/edusogno-esercizio/reset_password_form.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";
        
        $mail = new PHPMailer();
        
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'fb40968f2eedd0';                     //SMTP username
        $mail->Password   = '4994cd2d49ced6';                               //SMTP password
        $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($emailId);               //Name is optional

        //Content
        $mail->isHTML(true);
        $mail->Subject = "Please Reset your password";                               //Set email format to HTML
        $mail->Body = $link;

        $mail->send();

        if($mail->Send())
        {
            echo "Check Your Email and Click on the link sent to your email";
        }
        else
        {
            echo "Mail Error - >".$mail->ErrorInfo;
        }
    }else{
        echo "Invalid Email Address. Go back";
        DB::disconnect($connection);
    }
}
session_write_close();
?>