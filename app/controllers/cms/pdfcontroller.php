<?php

namespace Controllers;

namespace Controllers\Cms;

use Controllers\Controller;
use FPDF as GlobalFPDF;
use Services\Cms\OrderService;

define('EURO',chr(128));

class PdfController extends Controller
{
    private $orderService;
    function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function createInvoice()
    {
        $order_id = $_GET['order_id'];
        $orderData = $this->orderService->getOne($order_id);

        if (isset($_POST['invoice'])) {
            foreach ($orderData as $order) {

                $fullName = $order["FullName"];
                $adress = $order["Adress"];
                $phoneNumber = $order["PhoneNumber"];
                $email = $order["Email"];
                $subTotal = $order["SubTotal"];
                $total = $order["Total_price"];
                $totalTax = $order["Total_price"]*1.021;
                $paymentDue = $order["Payment_Due_Date"];
                $date = date("Y/m/d");

                $pdf = new GlobalFPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(40, 10, "Invoice Haarlem Festival");
                $pdf->SetFont('Arial', '', 12);
                $pdf->Ln();
                $pdf->Cell(40,10,"$fullName");
                $pdf->Ln();
                $pdf->Cell(40,10,"Adress: $adress");
                $pdf->Ln();
                $pdf->Cell(40,10,"Phone number: $phoneNumber");
                $pdf->Ln();
                $pdf->Cell(40,10,"Email: $email");
                $pdf->Ln();
                $pdf->Cell(40,10,"Subtotal: ".EURO."$subTotal");
                $pdf->Ln();
                $pdf->Cell(40,10,"Total: ".EURO."$total");
                $pdf->Ln();
                $pdf->Cell(40,10,"Total with added tax: ".EURO."$totalTax");
                $pdf->Ln();
                $pdf->Cell(40,10,"Payment due: $paymentDue");
                $pdf->Ln();
                $pdf->Cell(40,10,"Date: $date");
                $pdf->Output();
            }
        }
    }

    public function createTicket()
    {
        $order_id = $_GET['order_id'];
        $orderData = $this->orderService->getOne($order_id);

        if (isset($_POST['ticket'])) {
            foreach ($orderData as $order) {

                $fullName = $order["FullName"];
                $phoneNumber = $order["PhoneNumber"];

                $pdf = new GlobalFPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(40, 10, "Ticket(s) Haarlem Festival");
                $pdf->SetFont('Arial', '', 12);
                $pdf->Ln();
                $pdf->Cell(40,10,"$fullName");
                $pdf->Ln();
                $pdf->Cell(40,10,"$phoneNumber");
                $pdf->Ln();
                $pdf->Cell(40,10,"QR-Code: ");
                $pdf->Ln();
                $pdf->Output();
            }
        }
    }
}
