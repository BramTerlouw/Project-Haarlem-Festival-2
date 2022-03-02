<?php

namespace Controllers;
use Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class MailController extends Controller
{

    public function restorePassword()
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'haarlemfestival2022@gmail.com';                     //SMTP username
            $mail->Password   = 'InhollandisLeuk9!';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('info-haarlemfestival@gmail.com', 'Haarlem Festival');
            $mail->addAddress($_GET['email'], 'Employee');     //Add a recipient
            $mail->addReplyTo('no-reply@gmail.com', 'Information');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password recovery';
            $mail->Body    = 
            '<h1>Password recovery link:</h1>
            <p>Press link down below to change password.</p><br>
            <a href="localhost/user/restorePassword?email=' . $_GET['email'] . '">kaas</a>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
