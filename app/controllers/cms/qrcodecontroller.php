<?php

namespace Controllers;

namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\OrderService;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class QrcCodeController extends Controller
{
    private $orderService;

    function __construct()
    {
        $this->orderService = new OrderService();
    }

    function createQrCode()
    {
        $writer = new PngWriter();
        if (isset($_POST['ticket'])) {
        // Create QR code
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data('https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley')
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->build();
        $result->saveToFile(__DIR__ . '/qrcode.png');
        }
    }
}
