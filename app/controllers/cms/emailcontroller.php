<?php

namespace Controllers;

namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\UserService;
use Services\Cms\AuthService;
use Services\Cms\OrderService;
use Services\Cms\BookingService;
use Controllers\Cms\PdfController;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{
    private $userService;
    private $authService;
    private $orderService;
    private $bookingService;
    private $pdfController;

    function __construct()
    {
        $this->userService = new UserService();
        $this->authService = new AuthService();
        $this->orderService = new OrderService();
        $this->bookingService = new BookingService();
        $this->pdfController = new PdfController();
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
                    $mail->Password   = 'Ad55gkle!!lK';
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
                    //header('Location: /cms/auth/emailVerification?error=emailfailed');
                    echo $e->getMessage();
                }
            } else {
                header('Location: /cms/auth/emailVerification?error=EmailDoesNotExist');
            }
        }
    }
    public function sendInvoice()
    {
        $this->pdfController->createInvoice();
        
        if (isset($_POST['send-invoice'])) {

            $order_id = $_GET['order_id'];
            $orderData = $this->orderService->getOne($order_id);
            foreach ($orderData as $order) {
                //Create an instance; passing `true` enables exceptions


                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'haarlemfestival2022@gmail.com';
                    $mail->Password   = 'Ad55gkle!!lK';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    //Recipients
                    $mail->setFrom('info-haarlemfestival@gmail.com', 'Haarlem Festival');
                    $mail->addAddress($order["Email"], $order["FullName"]);
                    $mail->addReplyTo('no-reply@gmail.com', 'Information');

                    //Attachment
                    $mail->addAttachment("$order[Order_ID]-invoice.pdf");

                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Invoice';
                    $mail->Body    =
                        '<h1>Invoice Haarlem Festival</h1>
                        <p>Dear ' . $order["FullName"] . ',</p><br>
                        <p>In the appendix you can find the invoice.</p><br>';

                    if ($mail->send()) {
                        unlink("$order[Order_ID]-invoice.pdf");}
                        header('Location: /cms/order/view?order_id=' . $order_id);

                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

    public function sendTicket()
    {
        $this->pdfController->createTicket();
        
        if (isset($_POST['send-ticket'])) {

            $order_id = $_GET['order_id'];
            $orderData = $this->orderService->getOne($order_id);
            $bookingData = $this->bookingService->getOne($order_id);

            foreach ($orderData as $order) {

                //Create an instance; passing `true` enables exceptions

                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'haarlemfestival2022@gmail.com';
                    $mail->Password   = 'Ad55gkle!!lK';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    //Recipients
                    $mail->setFrom('info-haarlemfestival@gmail.com', 'Haarlem Festival');
                    $mail->addAddress($order["Email"], $order["FullName"]);
                    $mail->addReplyTo('no-reply@gmail.com', 'Information');

                    //Attachment
                    foreach ($bookingData as $booking) {
                    $mail->addAttachment("$booking[Booking_ID]-ticket.pdf");
                    }

                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Ticket';
                    $mail->Body    =
                        '<h1>Ticket(s) Haarlem Festival</h1>
                        <p>Dear ' . $order["FullName"] . ',</p><br>
                        <p>In the appendix you can find your ticket(s).</p><br>';

                    if ($mail->send()) {
                        unlink("$booking[Booking_ID]-ticket.pdf");
                        unlink("$booking[Booking_ID]-ticket.png");}
                        header('Location: /cms/order/view?order_id=' . $order_id);

                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
}
