<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>View invoice & ticket</h1>


<div class="order-buttons">
    <form action="/cms/pdf/createInvoice" method="post">
        <button class="order-button" name="invoice" type="invoice">Invoice</button>
    </form>
    <form action="/cms/qrcode/createQrCode" method="post">
        <button class="order-button" name="ticket" type="ticket">Ticket</button>
    </form>
</div>