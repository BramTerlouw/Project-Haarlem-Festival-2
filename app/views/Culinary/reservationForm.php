<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>
<div class="reservation-form-wrapper">
    <form class="reservation-form" action="" method="post">
        
        <h1>Reservation form:</h1>
        <div class="res-form-item">
                <label for="lname">Number of adults</label>
                <input type="text" id="NmbAdults" name="NmbAdults">
            </div>    
        
        <div class="res-form-item">
                <label for="lname">Number of children</label>
                <input type="text" id="NmbChild" name="NmbChild">
            </div> 
        
        <div class="res-form-item">
            <label for="Date">Choose a Date:</label>
            <input type="date" name="inputActivityDate" value="" min="<? echo $timespan[0] ?>" max="<? echo $timespan[1] ?>" required>
        </div>
        
        <div class="res-form-item">
            <label for="Time">Choose a Time:</label>
            <input type="time" name="inputActivityStart" value="" required>
        </div>

        <div class="res-form-item">
            <label for="Time">Message:</label>
            <textarea name="inputActivityStart" value="" required></textarea>
        </div>

        <button type="submit">Make reservation</button>
    </form>
</div>
<?php
require __DIR__ . '/../components/footer.php';
?>