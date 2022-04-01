<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Send invoice & ticket</h1>

<div class="order-buttons">
<? $order_id = $_GET['order_id']; ?>
    <form action="/cms/email/SendInvoice?order_id=<? echo $order_id ?>" method="post">
        <button class="order-button" name="send-invoice" type="send-invoice">Send Invoice</button>
    </form>
    <form action="/cms/qr/createQrCode?order_id=<? echo $order_id ?>" method="post">
    <!-- <form action="/cms/pdf/createTicket?order_id=<? echo $order_id ?>" method="post"> -->
        <button class="order-button" name="ticket" type="ticket">Ticket</button>
    </form>
</div>