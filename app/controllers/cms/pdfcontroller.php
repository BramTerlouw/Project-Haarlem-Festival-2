<?php

namespace Controllers;
namespace Controllers\Cms;

use Controllers\Controller;
use Controllers\Cms\QrController;
use FPDF as GlobalFPDF;
use Services\Cms\OrderService;
use Services\Cms\BookingService;

define('EURO', chr(128));

class PdfController extends Controller
{
    private $orderService;
    private $bookingService;
    private $qrController;
    function __construct()
    {
        $this->orderService = new OrderService();
        $this->bookingService = new BookingService();
        $this->qrController = new QrController();
    }

    // create invoice pdf

    public function createInvoice()
    {
        $order_id = $_GET['order_id'];
        $orderData = $this->orderService->getOne($order_id);

        if (isset($_POST['send-invoice'])) {
            foreach ($orderData as $order) {
                $date = date("Y/m/d");

                $pdf = new GlobalFPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(40, 10, "Invoice Haarlem Festival");
                $pdf->SetFont('Arial', '', 12);
                $pdf->Ln();
                $pdf->Cell(40, 10, "$order[FullName]");
                $pdf->Ln();
                $pdf->Cell(40, 10, "Adress: $order[Adress]");
                $pdf->Ln();
                $pdf->Cell(40, 10, "Phone number: $order[PhoneNumber]");
                $pdf->Ln();
                $pdf->Cell(40, 10, "Email: $order[Email]");
                $pdf->Ln();
                $pdf->Cell(40, 10, "Email: $order[Email]");
                $pdf->Ln();
                $pdf->Cell(40, 10, "Subtotal: " . EURO . "$order[Total_price]");
                $pdf->Ln();
                $pdf->Cell(40, 10, "Total BTW: " . EURO . "$order[Total_price]" * 0.21);
                $pdf->Cell(40, 10, "Total: " . EURO . "$order[Total_price]" * 1.21);
                $pdf->Ln();
                $pdf->Cell(40, 10, "Payment due: $order[Payment_Due_Date]");
                $pdf->Ln();
                $pdf->Cell(40, 10, "Date: $date");
                $pdf->Output('F',"$order_id-invoice.pdf"); // save pdf
            }
        }
    }

    // create ticket pdf
    public function createTicket()
    {
        $order_id = $_GET['order_id'];
        $bookingData = $this->bookingService->getOne($order_id);
        
        // generate qr code first
        $this->qrController->createQrCode();

        if (isset($_POST['send-ticket'])) {

            foreach ($bookingData as $data) {
                $pdf = new GlobalFPDF();
                $pdf->AddPage();

                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(40, 10, "Ticket(s) Haarlem Festival");
                
                $pdf->SetFont('Arial', '', 12);
                $pdf->Ln();
                $pdf->Cell(40, 10, $data["Order_ID"]);
                $pdf->Ln();
                $pdf->Cell(40, 10, $data["Event_Item"]);
                $pdf->Ln();
                $pdf->Cell(40, 10, "QR-Code: ");
                $pdf->Ln();
                $pdf->Image("$data[Booking_ID]-ticket.png",40,40,50); //add qr code to pdf
                $pdf->Ln();
                $pdf->Output('F',"$data[Booking_ID]-ticket.pdf"); // save pdf 
            }
        }
    }
}
