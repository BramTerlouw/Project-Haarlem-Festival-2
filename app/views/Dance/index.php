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

<nav class="nav-tickets-dance">

    <ul class="nav-list-left-tickets-dance">
        <li class="nav-item-tickets-dance">2022</li>
    </ul>

    <ul class="nav-list-right-tickets-dance">
        <li class="nav-item-tickets-dance"><a href="#">All-Access</a></li>
        <li class="nav-item-tickets-dance"><a href="#">FRI. 29 July</a></li>
        <li class="nav-item-tickets-dance"><a href="#">SAT. 30 July</a></li>
        <li class="nav-item-tickets-dance"><a href="#">SUN. 31 July</a></li>
    </ul>
</nav>

<?php
foreach($eventlist as $event){
    echo "<table>";
    echo "<td>".$event["Name"]."</td>";
    echo "<td>".$event["Start_Time"]."</td>";
    echo "<td>".$event["Location_ID"]."</td>";
    echo "<td>".$event["Ticket_Price"]."</td>";
    echo"</table>";
}
?>
</div>

<?php
require __DIR__ . '/../components/footer.php';
?>