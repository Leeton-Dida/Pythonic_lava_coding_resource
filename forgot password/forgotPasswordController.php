<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';

include '../config/connection.php';

$email = $_POST['email'];
//check if email is in the database
$sql = "SELECT * FROM users WHERE Email = '$email'";
$result = mysqli_query($conn, $sql);

//if email is in the database then generate reset code and store in session and send email to user with reset code
if (mysqli_num_rows($result) > 0) {
    //save email in session
    $_SESSION['email'] = $email;
    //generate reset code
    $resetCode = rand(100000, 999999);
    //store reset code in session
    $_SESSION['resetCode'] = $resetCode;
    //send email to user with reset code


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tafaradida@gmail.com';                     //SMTP username
        $mail->Password   = 'kehayivvhtyybilb';                               //SMTP password
        $mail->SMTPSecure = 'tls';             //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->smtpConnect([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ]);

        //Recipients
        $mail->setFrom('tafaradida@gmail.com', 'Pythonic lava');
        $mail->addAddress($email);     //Add a recipient


        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = "
            <html>
            <head>
            <title>Reset Password</title>
            </head>
            <body>
            <p>Hi,</p>
            <p>You have requested to reset your password. Please use the following code to reset your password:</p>
            <h1>$resetCode</h1>
            <p>If you did not request to reset your password, please ignore this email.</p>
            </body>
            </html>
            ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<script type='text/javascript'>alert('Email sent successfully. Please check your emails for the code.');</script>";
        //redirect to new password page
        header("refresh:0;url=../reset code.php");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    //if email is not in the database then show bootstrap alert and redirect to forgot password page
    echo "<script type='text/javascript'>alert('Email not found');</script>";
    header("refresh:0;url=../forgot password.php");
}
