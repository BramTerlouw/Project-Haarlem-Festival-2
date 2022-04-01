<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>

<INPUT class="Back-button" TYPE="button" VALUE="Back" onClick="history.go(-1);">

<div class="PaymentHeader-detail">
<img class= "PayementImage" src="/images/Payment/ideal.png" alt="ideal">
<h1 class="Payment-title">Ideal Payment</h1>
<p>This is the page where the ideal payment is made</p>
<br>
</div>

<!-- Payement Form -->
<div class="Payementrow">
  <div class="col-75">
    <div class="Paymentcontainer">
      <form action="/cms/order/insertOne">

        <div class="Payementrow">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="FullName"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="FullName" name="firstname" placeholder="Johan Van Galen">
            <label for="Email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="Email" name="email" placeholder="john@example.com">
            <label for="Adress"><i class="fa fa-address-card"></i> Address</label>
            <input type="text" id="Adress" name="address" placeholder="Haarlemmerstaart 14 1456JU">
            <label for="Phonenumber"><i class="fa fa-phone"></i> Phonenumber</label>
            <input type="text" id="Phonenumber" name="address" placeholder="+0698741565">
            
            <input type="submit" value="Continue to checkout" class="btn">
        </div>
      </form>
    </div>
  </div>
</div>
<?php
require __DIR__ . '/../components/footer.php';
?>