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
        
    <?php
    foreach($datelist as $date){?>
    <button class="button-date-Dance"type="button"><?php echo $date["Date"] ?></button>
    <?php
    }?>  
    </div>
</div>

<?php
foreach($eventlist as $event){?>
    <table class = "table-tickets-dance">
    <td class = "td-item-tickets-dance"><img class = "td-item-image-tickets-dance" src="/images/locations/<?php echo $event["Location"]?>.png"></td>
    <td class = "td-item-tickets-dance"><?php echo $event["Name"] ?></td>
    <td class = "td-item-tickets-dance"><?php echo $event["Start_Time"]?></td>
    <td class = "td-item-tickets-dance"><?php echo $event["End_Time"] ?></td>
    <td class = "td-item-tickets-dance"><?php echo $event["Location"] ?></td>
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
    <div class = "div-artists-dance">
    <img class = "image-artists-dance" src="/images/artists/<?php echo $artist["Artist_ID"]?>.png">
    <h1 class = "h1-artists-dance"><?php echo $artist["Name"] ?></h1>
    <p class = "p-artists-dance"><?php echo $artist["Description"]?></p>
    </div><?php
}?>
</div>


<?php
require __DIR__ . '/../components/footer.php';
?>