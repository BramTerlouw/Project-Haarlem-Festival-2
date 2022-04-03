<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Add new restaurant</h1>
<form action="/cms/restaurant/addRestaurant" method="POST">
    <section class="restaurant-form">

        <div class="form-item">
            <label for="inputRestaurantName">Name restaurant:</label>
            <input type="text" name="inputRestaurantName" value="" required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantType">Type:</label>
            <input type="text" name="inputRestaurantType" value="" required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantAccess">Accessibility:</label>
            <input type="text" name="inputRestaurantAccess" value="" required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantAddress">Address:</label>
            <input type="text" name="inputRestaurantAddress" value="" required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantMax">Seats:</label>
            <input type="number" name="inputRestaurantMax" value="" required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantPrice">Price:</label>
            <input type="number" name="inputRestaurantPrice" value="" required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantPriceChild">Price (-12):</label>
            <input type="number" name="inputRestaurantPriceChild" value="" required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantSessions">Sessions:</label>
            <input type="number" name="inputRestaurantSessions" value="" required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantStart">Start:</label>
            <input type="time" name="inputRestaurantStart" value="" required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantDuration">Duration:</label>
            <input type="time" name="inputRestaurantDuration" value="" required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputRestaurantDesc">Description:</label>
            <textarea class="test" name="inputRestaurantDesc" rows="6" required></textarea>
        </div>
    </section>
    <button name="submit" type="submit">Add restaurant</button>
</form>

</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->