<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Restaurant information:</h1>
<form>
    <section class="restaurant-form">

        <div class="form-item">
            <label for="inputActivityName">Name restaurant:</label>
            <input type="text" name="inputActivityName" value="<? echo $restaurant->Name ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputActivityName">Type:</label>
            <input type="text" name="inputActivityName" value="<? echo $restaurant->Type ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputActivityName">Accessibility:</label>
            <input type="text" name="inputActivityName" value="Je moet logica maken die het omzet naar waar/nietwaar">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputActivityName">Address:</label>
            <input type="text" name="inputActivityName" value="<? echo $restaurant->Adres ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputActivityName">Seats:</label>
            <input type="text" name="inputActivityName" value="<? echo $restaurant->Max_visitors?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputActivityName">Price:</label>
            <input type="text" name="inputActivityName" value="<? echo $restaurant->Price_Adults ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputActivityName">Price (-12):</label>
            <input type="text" name="inputActivityName" value="<? echo $restaurant->Price_Children?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputActivityName">Sessions:</label>
            <input type="text" name="inputActivityName" value="Jelle Kom Op">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputActivityName">Start:</label>
            <input type="text" name="inputActivityName" value="Lekker Bezig knaap">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputActivityName">Duration:</label>
            <input type="text" name="inputActivityName" value="Niet lachen">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="inputActivityDesc">Description:</label>
            <textarea class="test" name="inputActivityDesc" rows="6"><? echo $restaurant->Summary?></textarea>
        </div>

    </section>
</form>

</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->