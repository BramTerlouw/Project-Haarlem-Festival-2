<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Program item information:</h1>
<form action="/cms/eventitem/updateOne?id=<? echo $item->EventItem_ID ?>" method="POST">
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


        <div class="form-item-dropdwn">
            <label for="inputActivityPerformers">Performers: (HOLD CTRL TO (DE)SELECT)</label>
            <select name="inputActivityPerformers[]" required multiple>
                <? foreach ($artists as $artist) {
                    if (in_array($artist, $itemArtists)) { ?>
                        <option selected value="<? echo $artist->Artist_ID ?>">
                            <? echo $artist->Name ?>
                        </option>
                    <?} else { ?>
                        <option value="<? echo $artist->Artist_ID ?>">
                            <? echo $artist->Name ?>
                        </option>
                    <?}
                }?>
            </select>
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
        <div class="form-item">
            <label for="inputActivityDate">Date:</label>
            <input type="date" name="inputActivityDate" value="<? echo $item->Date ?>" min="<? echo $timespan[0] ?>" max="<? echo $timespan[1] ?>">
        </div>

        <div class="form-item-short">
            <label for="inputActivityStart">Timeslot:</label>
            <input type="time" name="inputActivityStart" value="<? echo $item->Start_Time ?>">
        </div>

        <div class="form-item-short">
            <label for="inputActivityEnd">Timeslot:</label>
            <input type="time" name="inputActivityEnd" value="<? echo $item->End_Time ?>">
        </div>

        <button class="cms-saveOverview-xl" name="submit" type="submit">Save changes
            <img src="/icons/cms-save.png" alt="cancel icon">
        </button>
    </div>
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