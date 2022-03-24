<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>
<INPUT class="Back-button" TYPE="button" VALUE="Back" onClick="history.go(-1);">

<div class="PaymentHeader-detail">
<img class= "PayementImage" src="/images/Payment/paypal.png" alt="paypal">
<h1 class="Payment-title">PayPal Payment</h1>
<p>This is the page where the paypal payment is made</p>
<br>
</div>

<!-- Payement Form -->
<div class="Payementrow">
  <div class="col-75">
    <div class="Paymentcontainer">
  
    </div>  
  </div>
</div>
<?php
require __DIR__ . '/../components/footer.php';
?>
