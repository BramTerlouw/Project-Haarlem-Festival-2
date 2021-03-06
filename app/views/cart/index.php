<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>

<main class="cart-container">

    <!-- cart -->
    <div class="cart">
        <h1 class="cart-header">Your shopping cart:</h1>
        <table class="cart-table">
            <thead class="cart-thead">
                <tr>
                    <th>Activity name</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody class="cart-tbody">
                <!-- First print all bookings in session -->
            <?
                foreach ($bookings as $booking) { ?>
                    <tr>
                    <td><? echo $booking['item']->Name ?></td>
                    <td>Patronaat</td>
                    <td><? echo $booking['item']->Date ?></td>
                    <td><? echo $booking['item']->Start_Time ?>-<? echo $booking['item']->End_Time ?></td>
                    <td>€ <? echo $booking['item']->Ticket_Price ?> X</td>
                    <td><input type="number" onchange="setBookingAmount(this.value, this.name)" name="<? echo $booking['item']->EventItem_ID ?>" id="" value="<? echo $booking['amount'] ?>"></td>
                    <td>€ <? echo $booking['item']->Ticket_Price * $booking['amount'] ?></td>
                    </tr>
                <?}?>

                <!-- Second print all reservations in session -->
                <?
                    foreach ($reservations as $reservation) { ?>
                    <tr>
                    <td><? echo $reservation['restaurant']->Name ?></td>
                    <td><? echo $reservation['restaurant']->Adres ?></td>
                    <td><? echo $reservation['date'] ?></td>
                    <td><? echo $reservation['time'] ?></td>
                    <td>€ 
                        <? echo (($reservation['restaurant']->Price_Adults * $reservation['amountAdult']) + 
                        ($reservation['restaurant']->Price_Children * $reservation['amountChild'])) ?>
                    </td>
                    <td><a href="/hf/culinary/reservationForm?id=<? echo $reservation['restaurant']->Restaurant_ID ?>&res=<? echo $reservation['id'] ?>">Edit</a></td>
                    <td>€ 
                        <? echo (($reservation['restaurant']->Price_Adults * $reservation['amountAdult']) + 
                        ($reservation['restaurant']->Price_Children * $reservation['amountChild']) + 10) ?>
                    </td>
                    </tr>
                <?}?>
            </tbody>
        </table>
        <!-- Display total amount of selected items-->
        <div class="cart-total">
            <span class="cart-total">
                Total: € <? echo $total ?>
            </span>
        </div>
    </div>

    <!-- buttons beneath cart -->
    <div class="cart-bottom-container">
        <div>
            <a class="cart-bottom-btn" href="/">Back</a>
        </div>
        <div>
            <a class="cart-bottom-btn" href="/hf/cart/unset">Empty cart</a>
        </div>
        <div>
            <a class="cart-bottom-btn" href="/hf/payment">Make Payment</a>
        </div>
    </div>

    <h2>You also might like this:</h2>

    <!-- recommended slider -->
    <div class="cart-recommended-container">
        <button onclick="updateCarouselLeft()"><</button>
        <div id="slider-container" class="recommended-slider-container"></div>
        <button onclick="updateCarouselRight()">></button>
    </div>
</main>

<script>
    var element1 = {
        title: "Restaurant 1",
        date: "Sunday July 31"
    };
    var element2 = {
        title: "Restaurant 2",
        date: "Sunday July 31"
    };
    var element3 = {
        title: "Restaurant 3",
        date: "Sunday July 31"
    };

    var elements = [element1, element2, element3];
    var loopNumbers = 0;

    function fillCarousel() {
        document.getElementById("slider-container").innerHTML = "";

        var element = document.createElement('div');
        element.classList.add("recommended-element")

        var title = document.createElement('h1');
        title.innerText = elements[loopNumbers].title;
        var date = document.createElement('p');
        date.innerText = elements[loopNumbers].date;

        element.appendChild(title);
        element.appendChild(date);
        document.getElementById("slider-container").appendChild(element);
    };

    function updateCarouselLeft() {
        if (loopNumbers > 0) {
            loopNumbers -= 1;
            fillCarousel();
        }
    }

    function updateCarouselRight() {
        if (loopNumbers < elements.length - 1) {
            loopNumbers += 1;
            fillCarousel();
        }
    }
    fillCarousel();

    function setBookingAmount(amount, id) {
        window.location.href = "/hf/cart/setBookingAmount?id=" + id + "&amount=" + amount;
    }
</script>
<?php
require __DIR__ . '/../components/footer.php';
?>