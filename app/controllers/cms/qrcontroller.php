<?php

namespace Controllers;

namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\OrderService;
use Services\Cms\BookingService;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Models\Booking;

class QrController extends Controller
{
    private $orderService;
    private $bookingService;
    function __construct()
    {
        $this->orderService = new OrderService();
        $this->bookingService = new BookingService();
    }

    function createQrCode()
    {
        $order_id = $_GET['order_id'];
        $bookingData = $this->bookingService->getOne($order_id);

        if (isset($_POST['send-ticket'])) {

            foreach ($bookingData as $booking) {
                $qrCodeID= hash("md5", $booking["Booking_ID"]);
                $this->bookingService->updateQr($booking["Booking_ID"], $qrCodeID);

                $result = Builder::create()
                    ->writer(new PngWriter())
                    ->writerOptions([])
                    ->data("/cms/booking/updateIsScanned?Qr_Code_ID=$qrCodeID")
                    ->encoding(new Encoding('UTF-8'))
                    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                    ->size(300)
                    ->margin(10)
                    ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
                    ->build();
                    
                $result->saveToFile("$booking[Booking_ID]-ticket.png");
            }
        }
    }
}
