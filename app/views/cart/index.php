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
                <tr>
                    <td>All-access Jazz</td>
                    <td>Patronaat</td>
                    <td>29 July</td>
                    <td>18:00-19:00</td>
                    <td>35,00 X</td>
                    <td><input type="number" name="" id="" value="2"></td>
                    <td>70</td>
                </tr>
                <tr>
                    <td>All-access Jazz</td>
                    <td>Patronaat</td>
                    <td>29 July</td>
                    <td>18:00-19:00</td>
                    <td>35,00 X</td>
                    <td><input type="number" name="" id="" value="2"></td>
                    <td>70</td>
                </tr>
            </tbody>
        </table>
        <div class="cart-total">
            <span class="cart-total">
                Total: 70,00
            </span>
        </div>
    </div>

    <!-- buttons beneath cart -->
    <div class="cart-bottom-container">
        <div>
            <a class="cart-bottom-btn" href="/">Back</a>
        </div>
        <div>
            <a class="cart-bottom-btn" href="#">Share</a>
            <a class="cart-bottom-btn" href="#">Payment</a>
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
</script>
<?php
require __DIR__ . '/../components/footer.php';
?>