<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>

<div class="reservation-info-wrapper">
    <h1>Restaurant information:</h1>
    <table>
        <tbody>
            <? foreach ($restaurant as $key => $value) { 
                if ($key == 'Restaurant_ID')
                    continue;?>
                <tr>
                    <td><? echo $key ?></td>
                    <td><? echo $value ?></td>
                </tr>
            <? } ?>
        </tbody>
    </table>
</div>

<div class="reservation-form-wrapper">
    <form class="reservation-form" action="/hf/cart/addResToCart?id=<? echo $restaurant->Restaurant_ID ?>" method="post">
        <? if (isset($_GET['res'])) {?>
            <input type="hidden" name="res_ID" value="<? echo $_GET['res'] ?>">
        <? } ?>
        <h1>Reservation form:</h1>
        <div class="res-form-item">
            <label for="lname">Number of adults</label>
            <input type="number" id="NmbAdults" name="NmbAdults" min="0" value="<? if (isset($reservation)) echo $reservation['amountAdult'] ?>" required>
        </div>

        <div class="res-form-item">
            <label for="lname">Number of children</label>
            <input type="number" id="NmbChild" name="NmbChild" min="0" value="<? if (isset($reservation)) echo $reservation['amountChild'] ?>" required>
        </div>

        <div class="res-form-item">
            <label for="Date">Choose a Date:</label>
            <input type="date" name="ActivityDate" 
            value="<? if (isset($reservation)) {
                $datetime = explode(',', $reservation['dateTime']);
                echo $datetime[0];
            } ?>" 
            min="<? echo $timespan[0] ?>" max="<? echo $timespan[1] ?>" required>
        </div>

        <!-- <div class="res-form-item">
            <label for="Time">Choose a Time:</label>
            <input type="time" name="ActivityTime" value="<? if (isset($reservation)) {
                $datetime = explode(',', $reservation['dateTime']);
                echo $datetime[1];
            } ?>" required>
        </div> -->

        <div class="res-form-item">
            <label for="ActivityTime">Time:</label>
            <select name="ActivityTime">
                <? 
                $options = 
                array(date('H:i', strtotime($restaurant->Start_Time)), date('H:i', strtotime($restaurant->Start_Time) + strtotime($restaurant->Duration)), date('H:i', strtotime($restaurant->Start_Time) + strtotime($restaurant->Duration) + strtotime($restaurant->Duration)));
                foreach ($options as $option) {
                    ?> <option value="<? echo $option ?>"<? if (isset($reservation)) {
                        $datetime = explode(',', $reservation['dateTime']);
                        if ($option == $datetime[1]) echo "selected";
                    } ?>><? echo $option ?></option><?
                }
                ?>
            </select>
        </div>

        <div class="res-form-item">
            <label for="Time">Message:</label>
            <textarea name="ActivityMessage"><? if (isset($reservation)) echo $reservation['message'] ?></textarea>
        </div>

        <button type="submit" name="submit">Make reservation</button>

        <div class="res-form-item">
            <small>* There will be a ??? 10,- fee for the reservation.</small>
        </div>
    </form>
</div>
<?php
require __DIR__ . '/../components/footer.php';
?>