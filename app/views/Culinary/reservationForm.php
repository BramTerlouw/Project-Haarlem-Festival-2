<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>
<div>
<form class="Reservation-form" action="event/insertReservation" method="post">
    <div class="form-item">
        <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname">   
        </div>
    <div class="form-item">
        <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname">   
        </div>
    <div class="form-item">
        <label for="lname">Email</label>
            <input type="text" id="Email" name="Email">
        </div>
    <div class="form-item">
        <label for="lname">Number of adults</label>
            <input type="text" id="NmbAdults" name="NmbAdults">
        </div>    
    <div class="form-item">
        <label for="lname">Number of children</label>
            <input type="text" id="NmbChild" name="NmbChild">
        </div> 
    <div class="form-item">
        <label for="Date">Choose a Date:</label>
            <select id="Date" name="Date">
                <option value="28th July">28th July</option>
                <option value="29th July">29th July</option>
                <option value="30th July">30th July</option>
            </select>
    </div>
    <div class="form-item">
        <label for="Time">Choose a Time:</label>
            <select id="Time" name="Time">
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
            </select>
    </div>
    <input type="submit" value="submit">
</form>
</div>
<?php
require __DIR__ . '/../components/footer.php';
?>