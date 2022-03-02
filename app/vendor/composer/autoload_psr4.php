<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Services\\' => array($baseDir . '/services'),
    'Routers\\' => array($baseDir . '/routers'),
    'Repositories\\' => array($baseDir . '/repositories'),
    'PHPMailer\\PHPMailer\\' => array($vendorDir . '/phpmailer/phpmailer/src'),
    'Models\\' => array($baseDir . '/models'),
    'Controllers\\' => array($baseDir . '/controllers'),
);