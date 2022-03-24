<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>
<body>
    <!-- Banner at the top of the page -->
    <div class="Banner-culinary">
        <h1 class="culinary-title">The culinary experience</h1>
    </div>

    <div class="flex-container-restaurant">
        <div class="flex-item-restaurant-header">
            <h1>Participating Restaurants</h1>
        </div>
        <div class="flex-item-restaurant-dropdown">
            <label for="Filter">Filter:</label>
            <select name="Filter" id="filter" onchange="filter()">
                <? foreach ($types as $type) {?>
                    <option id="type" value="<? echo $type['Type'] ?>"><? echo $type['Type'] ?></option>
                <? } ?>
            </select>
            <a class="resetFilter" href="/hf/culinary/restaurants">X</a>
        </div>
    </div>

    <div class="Restaurant-Container">
        <? foreach ($restaurantlist as $restaurant) {?>
            <div class="restaurant-item">
                <img class="restaurant-item-img" src="/images/Culinary/<? echo $restaurant->Restaurant_ID ?>.png" alt="restaurant picture">
                <div class="restaurant-item-content">
                    <!-- restaurant  name and summary -->
                    <h2><? echo $restaurant->Name ?></h2><hr>
                    <p><? echo $restaurant->Summary ?></p>

                    <br>

                    <!-- restaurant type -->
                    <h3>Type</h3>
                    <p><? echo $restaurant->Type ?></p>

                    <!-- make rerervation button -->
                    <button onclick="window.location.href='/hf/culinary/reservationForm?id=<? echo $restaurant->Restaurant_ID ?>'" type="button">Make reservation</button>
                </div>
            </div>
        <? } ?>
    </div> 
<?php
require __DIR__ . '/../components/footer.php';
?>

<script>
    function filter() {
        var select = document.getElementById('filter');
        var data = select.value;
        window.location.href="http://localhost/hf/culinary/restaurants?type=" + data;
    }
</script>

