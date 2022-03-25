<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';


?>

<INPUT class="Back-button" TYPE="button" VALUE="Previous Page" onClick="history.go(-1);">

<!-- Payment header -->
<div class="PaymentHeader">
<h1 class="Payment-title">Payment</h1>
<p>This is the page where the payment is made</p>
<br>
</div>

<div class="Paymentselector">
    
    <div class="Paymentselector-item">
        <a class="payment-link" href="/hf/payment/creditcard">
        <img class= "PayementImage" src="/images/Payment/credit_card.png" alt="creditcard">
    	<h3 class="PayementTitle">Creditcard</h3>
        </a>
    </div>
    
    <div class="Paymentselector-item">
        <a class="payment-link" href="/hf/payment/ideal">
        <img class= "PayementImage" src="/images/Payment/ideal.png" alt="ideal">
        <h3 class="PayementTitle">Ideal</h3>
        </a>
    </div>
    <div class="Paymentselector-item">
        <a class="payment-link" href="/hf/payment/paypal">
        <img class= "PayementImage" src="/images/Payment/paypal.png"alt="paypal">
        <h3 class="PayementTitle">Paypal</h3>
        </a>
    </div>
</div>


<?php
require __DIR__ . '/../components/footer.php';
?>