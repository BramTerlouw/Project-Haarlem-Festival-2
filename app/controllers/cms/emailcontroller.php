<?php

namespace Controllers;
namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\UserService;
use Services\Cms\AuthService;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller{
    private $userService;
    private $authService;

    function __construct()
    {
        $this->userService = new UserService();
        $this->authService = new AuthService();
    }
    
    // request reset pw
    public function requestReset()
    {
        if (isset($_POST['inputMail'])) {
            if (!$this->userService->validateEmail($_POST['inputMail'])) {
                
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                $userMail = $_POST['inputMail'];
                $code = uniqid(true);
                $this->authService->setResetCode($userMail, $code);
                
                try {
                    //Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'haarlemfestival2022@gmail.com';
                    $mail->Password   = 'InhollandisLeuk9!';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    //Recipients
                    $mail->setFrom('info-haarlemfestival@gmail.com', 'Haarlem Festival');
                    $mail->addAddress($userMail, 'Employee');
                    $mail->addReplyTo('no-reply@gmail.com', 'Information');

                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Password recovery';
                    $mail->Body    =
                        '<h1>Password recovery link:</h1>
                        <p>Press link down below to change password.</p><br>
                        <a href="localhost/cms/auth/restorePassword?code=' . $code . '">Click me</a>';

                    $mail->send();
                    header('Location: http://localhost/cms/auth');

                } catch (Exception $e) {
                    header('Location: /cms/auth/emailVerification?error=emailfailed');
                }
            } else {
                header('Location: /cms/auth/emailVerification?error=EmailDoesNotExist');
            }
        }
    }
}
?>