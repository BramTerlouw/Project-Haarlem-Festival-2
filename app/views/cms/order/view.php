<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Send invoice & ticket</h1>

<div class="order-buttons">
<? $order_id = $_GET['order_id']; ?>
    <form action="/cms/email/sendInvoice?order_id=<? echo $order_id ?>" method="post">
        <button class="order-button" name="send-invoice" type="send-invoice">Send Invoice</button>
    </form>
    <form action="/cms/qr/createQrCode?order_id=<? echo $order_id ?>" method="post">
    <button class="order-button" name="send-ticket" type="send-ticket">Send Ticket</button>
    <!-- <form action="/cms/email/sendTicket?order_id=<? echo $order_id ?>" method="post">
        <button class="order-button" name="send-ticket" type="send-ticket">Send Ticket</button>
    </form> -->
</div>