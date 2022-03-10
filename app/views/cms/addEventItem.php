<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-cms.php';
?>

<h1>Add program item:</h1>
<form action="/cms/insertEventItem?eventID=<? echo $_GET['eventID'] ?>" method="POST">
<section class="eventItem-info-container">
    <div class="eventItem-info">
        <div class="form-item">
            <label for="inputActivityName">Name activity:</label>
            <input type="text" name="inputActivityName" value="" placeholder="Enter item name..." required>
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>


        <div class="form-item-dropdwn">
            <label for="inputActivityLocation">Location:</label>
            <select name="inputActivityLocation">
                <? foreach ($locations as $loc) {?>
                    <option value="<? echo $loc->Location_ID ?>"><? echo $loc->Name ?></option>
                <?}?>
            </select>
        </div>


        <div class="form-item-dropdwn">
            <label for="inputActivityPerformers">Performers: (HOLD CTRL TO (DE)SELECT)</label>
            <select name="inputActivityPerformers[]" required multiple>
                <? foreach ($performers as $performer) { ?>
                    <option value="<? echo $performer->Artist_ID ?>">
                        <? echo $performer->Name ?>
                    </option>
                <?}?>
            </select>
        </div>


        <div class="form-item">
            <label for="inputActivityDesc">Description:</label>
            <textarea class="test" name="inputActivityDesc" rows="6" placeholder="Enter item description..." required></textarea>
        </div>
        
    </div>
    <div class="eventItem-picture"></div>
</section>

<section class="eventItem-progam-container">
    <div class="eventItem-program-datetimepicker">
        <h1>Date & time information:</h1>
        <div class="form-item">
            <label for="inputActivityDate">Date:</label>
            <input type="date" name="inputActivityDate" value="" min="<? echo $timespan[0] ?>" max="<? echo $timespan[1] ?>" required>
        </div>

        <div class="form-item-short">
            <label for="inputActivityStart">Timeslot start:</label>
            <input type="time" name="inputActivityStart" value="" required>
        </div>

        <div class="form-item-short">
            <label for="inputActivityEnd">Timeslot end:</label>
            <input type="time" name="inputActivityEnd" value="" required>
        </div>
    </div>
</section>


<section class="eventItem-progam-container">
    <div class="eventItem-program-datetimepicker">
        <h1>Ticket information:</h1>
        <div class="form-item-short">
            <label for="inputActivityTickets">Amount of tickets:</label>
            <input type="number" name="inputActivityTickets" value="" required>
        </div>

        <div class="form-item-short">
            <label for="inputActivityPrice">Ticket price:</label>
            <input type="number" name="inputActivityPrice" min="1" step="any" value="" required/>
        </div>

        <button class="cms-saveOverview-xl" name="submit" type="submit">Save changes
            <img src="/icons/cms-save.png" alt="cancel icon">
        </button>
    </div>
</section>
</form>

</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->