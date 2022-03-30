<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>View invoice & ticket</h1>

<div class="order-buttons">
<? $order_id = $_GET['order_id']; ?>
    <form action="/cms/pdf/createInvoice?order_id=<? echo $order_id ?>" method="post">
        <button class="order-button" name="invoice" type="invoice">Invoice</button>
    </form>
    <!-- <form action="/cms/qrcode/createQrCode" method="post"> -->
    <form action="/cms/pdf/createTicket?order_id=<? echo $order_id ?>" method="post">
        <button class="order-button" name="ticket" type="ticket">Ticket</button>
    </form>
</div>