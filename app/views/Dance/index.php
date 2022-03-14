<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>

<div class="Banner-dance">
    
<h1 class="dance-title">Haarlem Dance Event</h1>

<h2 class="dance-undertitle">Experience the Dutch way of partying</h2>

<p class="dance-description">A brand new addition to the Haarlem Festival 
    is the Haarlem Dance Event. In this event dance, house, techno and trance are central. 
    Names as Nicky Romero, Afrojack, Tiësto, Hardwell, Armin van Buuren and Martin Garrix are 
    performing on multiple stages spread over the beautyfull city of Haarlem, North-Holland.
</p>

<div class ="navbuttons-dance">   
<button class="button-performers"type="button">Performers</button>
<button class="button-tickets"type="button">Program & Tickets</button>
<button class="button-venues"type="button">Venues</button>
</div>
</div>

<div class = "ticket-overview-dance">

<div class = "ticket-navigation-dance">
    <h3 class="nav-tickets-year-dance">2022</h3>

    <div class ="navbuttons-tickets-dance">   
        <button class="button-AllAccess-Dance"type="button">All-Access</button>
        <button class="button-Friday-Dance"type="button">FRI. 29 July</button>
        <button class="button-Saturday-Dance"type="button">SAT. 30 July</button>
        <button class="button-Sunday-Dance"type="button">SUN. 31 July</button>
    </div>
</div>

<?php
foreach($eventlist as $event){?>
    <table class = "table-tickets-dance">
    <td class = "td-item-tickets-dance"><img class = "td-item-image-tickets-dance" src="/images/locations/<?php echo $event["Location_ID"]?>.png"></td>
    <td class = "td-item-tickets-dance"><?php echo $event["Name"] ?></td>
    <td class = "td-item-tickets-dance"><?php echo $event["Start_Time"]?></td>
    <td class = "td-item-tickets-dance"><?php echo $event["End_Time"] ?></td>
    <td class = "td-item-tickets-dance"><?php echo $event["Location_ID"] ?></td>
    <td class = "td-item-tickets-dance">€<?php echo $event["Ticket_Price"] ?></td>
    <td class = "td-item-tickets-dance">
    <a href="#">
                <span class="fa fa-shopping-cart"></span>
            </a>
            </td>
    </table><?php
}?>
</div>

<div class = "artists-dance">
<h1 class = "artists-title-dance">Performers</h1>

<?php
foreach($artistlist as $artist){?>
    <table class = "table-artists-dance">
    <td class = "td-item-artists-dance"><img class = "td-item-image-artists-dance" src="/images/artists/<?php echo $artist["Artist_ID"]?>.png"></td>
    <td class = "td-item-artists-dance"><?php echo $artist["Name"] ?></td>
    <td class = "td-item-artists-dance"><?php echo $artist["Description"]?></td>
    </table><?php
}?>
</div>


<?php
require __DIR__ . '/../components/footer.php';
?>