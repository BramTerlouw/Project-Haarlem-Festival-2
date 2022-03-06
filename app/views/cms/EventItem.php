<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-cms.php';
?>

<h1>Program item information:</h1>
<form action="/cms/updateEventItem?id=<? echo $item->EventItem_ID ?>" method="POST">
<section class="eventItem-info-container">
    <div class="eventItem-info">
        <div class="form-item">
            <label for="inputActivityName">Name activity:</label>
            <input type="text" name="inputActivityName" value="<?php echo $item->Name ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>


        <div class="form-item-dropdwn">
            <label for="inputActivityLocation">Location:</label>
            <select name="inputActivityLocation">
                <? foreach ($locations as $loc) {
                    if ($loc->Name == $item->Location) {?>
                        <option value="<? echo $loc->Location_ID ?>" selected><? echo $loc->Name ?></option>
                    <? } else { ?>
                        <option value="<? echo $loc->Location_ID ?>"><? echo $loc->Name ?></option>
                    <?}
                    } ?>
            </select>
        </div>


        <div class="form-item">
            <label for="inputActivityPerformers">Performers:</label>
            <?php foreach ($itemPerformers as $performer) {?>
                <p><strong><?php echo $performer[1] ?></strong></p>
            <?php } ?>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>


        <div class="form-item">
            <label for="inputActivityDesc">Description:</label>
            <textarea class="test" name="inputActivityDesc" rows="6"><?php echo $item->Description ?></textarea>
        </div>
        
    </div>
    <div class="eventItem-picture"></div>
</section>

<section class="eventItem-progam-container">
    <div class="eventItem-program-datetimepicker">
        <h1>Date & time information:</h1>
        <div class="form-item-dropdwn">
            <label for="inputActivityDate">Date:</label>
            <select name="inputActivityDate">
                <option value="<? echo $item->Date ?>"><? echo $item->Date ?></option>
            </select>
        </div>

        <div class="form-item-short">
            <label for="inputActivityStart">Timeslot:</label>
            <input type="time" name="inputActivityStart" value="<? echo $item->Start_Time ?>">
        </div>

        <div class="form-item-short">
            <label for="inputActivityEnd">Timeslot:</label>
            <input type="time" name="inputActivityEnd" value="<? echo $item->End_Time ?>">
        </div>
    </div>
    <button type="submit" name="submit" value="submit">Edit</button>
    <!-- <table>
        <thead>
            <tr>
                <th>Activity name</th>
                <th>Time</th>
                <th>Location</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Fox & the Mayors</td>
                <td>18:00 - 19:00</td>
                <td>Patronaat</td>
                <td>15,00 ,-</td>
            </tr>
            <tr>
                <td>Fox & the Mayors</td>
                <td>18:00 - 19:00</td>
                <td>Patronaat</td>
                <td>15,00 ,-</td>
            </tr>
            <tr>
                <td>Fox & the Mayors</td>
                <td>18:00 - 19:00</td>
                <td>Patronaat</td>
                <td>15,00 ,-</td>
            </tr>
            <tr>
                <td>Fox & the Mayors</td>
                <td>18:00 - 19:00</td>
                <td>Patronaat</td>
                <td>15,00 ,-</td>
            </tr>
            <tr>
                <td>Fox & the Mayors</td>
                <td>18:00 - 19:00</td>
                <td>Patronaat</td>
                <td>15,00 ,-</td>
            </tr>
            <tr>
                <td>Fox & the Mayors</td>
                <td>18:00 - 19:00</td>
                <td>Patronaat</td>
                <td>15,00 ,-</td>
            </tr>
        </tbody>
    </table> -->
</section>
</form>

</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->