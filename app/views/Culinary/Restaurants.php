<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>
<body>
    <br>
    <div class="flex-container-restaurant">
        <div class="flex-item-restaurant-header">
            <h1>Participating Restaurants</h1>
            <hr id="line">
        </div>
        <div class="flex-item-restaurant-dropdown">
            <label for="Filter">Filter:</label>
            <select name="Filter" id="Filter">
                <option value="Dutch">Dutch</option>
                <option value="French">French</option>
                <option value="SeaFood">Fish & Seafood</option>
                <option value="Modern">Modern</option>
            </select>
        </div>
    </div>
    <p class="Page-indicator-top">Page 1</p>

    <div class="Restaurant-Container">
        <div id="Restaurant-item-container" class="Restaurant-container"></div>
    </div>


<?php foreach ($restaurantlist as $restaurant){ ?>
    <div class="Restaurant-list">
            <div class="Restaurant-title">
                <?php echo $restaurant->Name;?>
            </div>
            <div class="Restaurant-type">
                <?php echo $restaurant->Type;?> 
            </div>
            
            <div class="Restaurant-summary">
                <? echo $restaurant->Summary; ?>
            </div>

            <div class="Restaurant-access">
                <? if ($restaurant->Wheelchair_accessible)
                        echo "This restaurant is wheelchair accessible";
                    else
                        echo "This restaurant is'nt wheelchair accessible";
                ?>
            </div>
        <div class="Restaurant-button">
            <button class="allrestaurant-button" onclick="window.location.href='/hf/culinary/reservationForm?id=<? echo $restaurant->Restaurant_ID ?>'" type="button">Make reservation</button>
        </div>
        <br><br><br>
    </div>  
    

 <?php } ?> 

<?php
require __DIR__ . '/../components/footer.php';
?>

