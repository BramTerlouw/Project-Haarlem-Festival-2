<?php

namespace Controllers;
namespace Controllers\Cms;

use Controllers\Controller;
use Services\Cms\OrderService;

use Knp\Snappy\Pdf;


class PdfController extends Controller{
    private $orderService;
    function __construct()
    {
        $this->orderService = new OrderService();
    }

    // invoice in cms
    public function createInvoice()
    {
        if (isset($_POST['invoice'])) {
            
            $snappy = new Pdf('/usr/local/bin/wkhtmltopdf');
            $snappy->generateFromHtml('<h1>Bill</h1><p>You owe me money, dude.</p>', 'test.pdf');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="file.pdf"');
            echo $snappy->getOutput('http://www.github.com');
        }
    }
}