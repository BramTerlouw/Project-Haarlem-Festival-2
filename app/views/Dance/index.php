<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>

<div class="Banner-dance">

<?php
foreach($eventList as $event){?>
<h1 class="dance-title"><?php echo $event["Name"]?></h1>
<?php }?>


<?php
foreach($eventList as $event){?>
<p class="dance-description"> <?php echo $event["Description"]?>
</p>
<?php }?>

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
    foreach($dateList as $date){?>
    <a href="/hf/dance?event=dance&date=<? echo $date[0]?>" class="button-date-Dance"type="button"><?php echo $date["Date"] ?></a>
    <?php
    }?>  
    </div>
</div>

<?php
foreach($eventItemList as $event){?>
    <table class = "table-tickets-dance">
    <td class = "td-item-tickets-dance"><img class = "td-item-image-tickets-dance" src="/images/locations/<?php echo $event["Location_ID"]?>.png"></td>
    <td class = "td-item-tickets-dance"><?php echo $event["Name"] ?></td>
    <td class = "td-item-tickets-dance"><?php echo $event["Start_Time"]?></td>
    <td class = "td-item-tickets-dance"><?php echo $event["End_Time"] ?></td>
    <td class = "td-item-tickets-dance"><?php echo $event["Location"] ?></td>
    <td class = "td-item-tickets-dance">€<?php echo $event["Ticket_Price"] ?></td>
    <td class = "td-item-tickets-dance">
    <a href="/hf/cart/addTicketToCart?event=<? echo $_GET['event'] ?>&id=<? echo $event['EventItem_ID']?>"  >
                <span class="fa fa-shopping-cart"></span>
            </a>
            </td>
    </table><?php
}?>
</div>

<div class = "artists-dance">
<h1 class = "artists-title-dance">Performers</h1>

<?php
foreach($artistList as $artist){?>
    <div class = "div-artists-dance">
    <img class = "image-artists-dance" src="/images/artists/<?php echo $artist["Artist_ID"]?>.png">
    <h1 class = "h1-artists-dance"><?php echo $artist["Name"] ?></h1>
    <p class = "p-artists-dance"><?php echo $artist["Description"]?></p>
    </div><?php
}?>
</div>

<div class = "location-dance">

<h1 class ="location-title-dance">Venues</h1>

<div class ="location-images-dance">

<?php
foreach($locationList as $location){?>
    <div class = "div-location-dance">
    <img class = "image-location-dance" src="/images/locations/<?php echo $location["Location_ID"]?>.png">
    <h1 class = "h1-location-dance"><?php echo $location["Name"] ?></h1>
    <p class = "p-location-dance"><?php echo $location["Address"]?></p>
    </div><?php
}?>
</div>
</div>
</div>
 <script>
    function myFunction(value) {
    var popup = document.getElementById("myPopup");
    popup.innerText = value;
    popup.classList.toggle("show");
    }

 </script>

<?php
require __DIR__ . '/../components/footer.php';
?>