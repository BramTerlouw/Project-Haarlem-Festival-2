<?php

namespace Controllers;

namespace Controllers\Cms;

use Controllers\Controller;
// use Services\Cms\OrderService;
// use Services\Cms\BookingService;

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

class QrController extends Controller
{
    // private $orderService;
    function __construct()
    {
        // $this->orderService = new OrderService();
    }

    function createQrCode()
    {
        // $order_id = $_GET['order_id'];
        // $orderData = $this->orderService->getOne($order_id);
        $result = Builder::create()
        ->writer(new PngWriter())
        ->writerOptions([])
        ->data('Custom QR code contents')
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
        ->size(300)
        ->margin(10)
        ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
        ->labelText('This is the label')
        ->labelFont(new NotoSans(20))
        ->labelAlignment(new LabelAlignmentCenter())
        ->build();

        // Directly output the QR code
        header('Content-Type: ' . $result->getMimeType());
        echo $result->getString();

        if (isset($_POST['ticket'])) {
            //$qr = new QrCode("Hi");
        }
    }
}
