<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-cms.php';
?>

<h1>Program item information:</h1>
<section class="eventItem-info-container">
    <div class="eventItem-info">
        <div class="form-item">
            <label for="">Name activity:</label>

            <input type="text" name="" value="<?php echo $item->Name ?>">

            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>


        <div class="form-item-dropdwn">
            <label for="">Location:</label>

            <select name="" id="">
                <? foreach ($locations as $loc) {
                    if ($loc->Name == $item->Location) {?>
                        <option value="<? echo $loc->Name ?>" selected><? echo $loc->Name ?></option>
                    <? } else { ?>
                        <option value="<? echo $loc->Name ?>"><? echo $loc->Name ?></option>
                    <?}
                    } ?>
            </select>
        </div>


        <div class="form-item">
            <label for="">Performers:</label>
            <?php foreach ($itemPerformers as $performer) {?>
                <p><strong><?php echo $performer[1] ?></strong></p>
            <?php } ?>

            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>


        <div class="form-item">
            <label for="">Description:</label>
            
            <textarea class="test" name="" rows="6"><?php echo $item->Description ?></textarea>
        </div>
        
    </div>
    <div class="eventItem-picture"></div>
</section>

<section class="eventItem-progam-container">
    <div class="eventItem-program-datetimepicker">
        <h1>Date & time information:</h1>
        <div class="form-item-dropdwn">
            <label for="">Date:</label>

            <select name="" id="">
                <option value=""><? echo $item->Date ?></option>
                <option value="">Kees</option>
            </select>
        </div>
        <div class="form-item-dropdwn">
            <label for="">Timeslot:</label>

            <select name="" id="">
                <option value="<? echo $item->Start_Time . " - " . $item->End_Time?>"><? echo $item->Start_Time . " - " . $item->End_Time?></option>
                <option value="">15:00:00 - 16:00:00</option>
                <option value="">16:00:00 - 17:00:00</option>
                <option value="">18:00:00 - 19:00:00</option>
                <option value="">19:00:00 - 20:00:00</option>
                <option value="">20:00:00 - 21:00:00</option>
                <option value="">18:00:00 - 19:00:00</option>
                <option value="">19:30:00 - 20:30:00</option>
                <option value="">21:00:00 - 22:00:00</option>
            </select>
        </div>
    </div>

    <table>
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
    </table>
</section>


</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->