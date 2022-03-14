<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>

<div class="Banner-jazz">
    
<h1 class="jazz-title">Jazz</h1>

<h2 class="jazz-undertitle">Live with soul</h2>

<p class="jazz-description">Haarlem Jazz is an important music event for the City of  Haarlem. 
We want to recreate part of this festival by inviting some of the bands that
previously performed there to play at the Patronaat. On Sunday, some of the bands will take
to the big stage at the Grote Markt to perform for all visitors for free! 
</p>

<div class ="navbuttons-jazz">   
<button class="button-tickets-jazz"type="button">Program & Tickets</button>
<button class="button-venues-jazz"type="button">Venues</button>
</div>
</div>

<div class = "ticket-overview-jazz">

<div class = "ticket-navigation-jazz">
    <h3 class="nav-tickets-year-jazz">2022</h3>

    <div class ="navbuttons-tickets-jazz">   
        <button class="button-AllAccess-jazz"type="button">All-Access</button>
        <button class="button-Friday-jazz"type="button">FRI. 29 July</button>
        <button class="button-Saturday-jazz"type="button">SAT. 30 July</button>
        <button class="button-Sunday-jazz"type="button">SUN. 31 July</button>
    </div>
</div>

<?php
foreach($eventlist as $event){?>
    <table class = "table-tickets-jazz">
    <td class = "td-item-tickets-jazz"><img class = "td-item-image-tickets-jazz" src="/images/locations/<?php echo $event["Location_ID"]?>.png"></td>
    <td class = "td-item-tickets-jazz"><?php echo $event["Name"] ?></td>
    <td class = "td-item-tickets-jazz"><?php echo $event["Start_Time"]?></td>
    <td class = "td-item-tickets-jazz"><?php echo $event["End_Time"] ?></td>
    <td class = "td-item-tickets-jazz"><?php echo $event["Location_ID"] ?></td>
    <td class = "td-item-tickets-jazz">€<?php echo $event["Ticket_Price"] ?></td>
    <td class = "td-item-tickets-jazz">
    <a href="#">
                <span class="fa fa-shopping-cart"></span>
            </a>
            </td>
    </table><?php
}?>
</div>

<?php
require __DIR__ . '/../components/footer.php';
?>