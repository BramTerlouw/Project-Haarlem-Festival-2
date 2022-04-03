<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
use Models\Role;
?>

<h1>Restaurant information:</h1>
<form action="/cms/restaurant/editRestaurant?id=<? echo $restaurant->Restaurant_ID ?>" method="POST">
    <section class="restaurant-form">

        <div class="form-item">
            <label for="inputRestaurantName">Name restaurant:</label>
            <input type="text" name="inputRestaurantName" value="<? echo $restaurant->Name ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantType">Type:</label>
            <input type="text" name="inputRestaurantType" value="<? echo $restaurant->Type ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantAccess">Accessibility:</label>
            <input type="text" name="inputRestaurantAccess" value="<? echo $restaurant->Wheelchair_accessible ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantAddress">Address:</label>
            <input type="text" name="inputRestaurantAddress" value="<? echo $restaurant->Adres ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantMax">Seats:</label>
            <input type="text" name="inputRestaurantMax" value="<? echo $restaurant->Max_visitors?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantPrice">Price:</label>
            <input type="text" name="inputRestaurantPrice" value="<? echo $restaurant->Price_Adults ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantPriceChild">Price (-12):</label>
            <input type="text" name="inputRestaurantPriceChild" value="<? echo $restaurant->Price_Children?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantSessions">Sessions:</label>
            <input type="text" name="inputRestaurantSessions" value="<? echo $restaurant->Sessions ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantStart">Start:</label>
            <input type="text" name="inputRestaurantStart" value="<? echo $restaurant->Start_Time ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantDuration">Duration:</label>
            <input type="text" name="inputRestaurantDuration" value="<? echo $restaurant->Duration ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantDesc">Description:</label>
            <textarea class="test" name="inputRestaurantDesc" rows="6"><? echo $restaurant->Summary?></textarea>
        </div>

    </section>
    <button name="submit" type="submit">Edit restaurant</button>
    <? if ($_SESSION['role'] == Role::Admin && $restaurant->Status == true) { ?>
        <a href="/cms/restaurant/changeStatus?status=1&id=<?echo $restaurant->Restaurant_ID ?>">Deactivate</a>
    <? } else { ?>
        <a href="/cms/restaurant/changeStatus?status=0&id=<?echo $restaurant->Restaurant_ID ?>">Activate</a>
    <? } ?>
</form>

</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->