<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-cms.php';

function converseDate($date)
{
    $timestmp = strtotime($date);
    return date("l", $timestmp);
}
?>

<?php
$uriEvent = $_GET['event'];
?>

<section class="overview-container-info">

    <h1 class="overview-header"><?php echo ucfirst($uriEvent) ?> Event</h1>
    <div class="overview-info">
        <form action="/cms/event/updateOne?id=<? echo $event->Event_ID ?>" method="POST">
            <div class="form-item">
                <label for="eventName">Event name:</label>

                <input type="text" name="eventName" value="<?php echo ucfirst($event->Name) ?>">

                <img src="/icons/cms-edit-form.png" alt="edit button">
            </div>


            <div class="form-item">
                <label for="eventDesc">Description:</label>

                <textarea name="eventDesc" rows="6"><?php echo $event->Description ?></textarea>

            </div>

            <div class="form-item">
                <label>Date:</label>

                <input type="date" name="EventStart" value="<?php echo $event->StartDate ?>">
                <input type="date" name="eventEnd" value="<?php echo $event->EndDate ?>">
            </div>

            <div class="form-item">
                <label for="">Location(s):</label>

                <?php
                if (isset($locArr)) {
                    foreach ($locArr as $location) { ?>
                        <p><strong><?php echo $location ?></strong></p>
                <?php }
                } ?>

                <a href="/cms/locations"><img class="clickable" src="/icons/cms-edit-form.png" alt="edit button"></a>
            </div>
            
            <button class="cms-saveOverview-xl" name="submit" type="submit">Save changes
                <img src="/icons/cms-save.png" alt="cancel icon">
            </button>
    </div>
    </form>

    <div class="overview-image">
        <div class="placeholder-image"></div>
        <button>Upload image(s)</button>
    </div>
</section>

<section class="overview-container-table">

    <div class="overview-btn-container">

        <ul class="overview-btns-left">
            <? for ($i = 0; $i < sizeOf($dateArr); $i++) {
                // first default on first date when no date was given (initial page load)
                // when there is a date param and matches an array date, give active class
                if (!isset($_GET['date']) && $i == 0 || (isset($_GET['date']) && $_GET['date'] == $dateArr[$i][0])) { ?>
                    <li>
                        <a class="btns-left-active" href="/cms/event?event=<? echo $event->Name ?>&date=<? echo $dateArr[$i][0] ?>">
                            <? echo converseDate($dateArr[$i][0]) ?>
                        </a>
                    </li>
                <? }

                // else display date on normal way
                else { ?>
                    <li>
                        <a href="/cms/event?event=<? echo $event->Name ?>&date=<? echo $dateArr[$i][0] ?>">
                            <? echo converseDate($dateArr[$i][0]) ?>
                        </a>
                    </li>
            <? }
            } ?>
        </ul>

        <ul class="overview-btns-right">
            <li>
                <a href="/cms/eventitem/addEventItem?eventID=<? echo $event->Event_ID ?>&event=<?echo $uriEvent?>">
                    Add item
                    <img src="/icons/add-item.png" alt="add item">
                </a>
            </li>
        </ul>

    </div>
    <div class="table-wrapper">
        <table class="event-item-table">
            <tr>
                <th></th>
                <th>Activity name</th>
                <th>Time</th>
                <th>Location</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($itemArr as $item) { ?>
                <tr>
                    <td></td>
                    <td><?php echo $item->Name ?></td>
                    <td><?php echo $item->Start_Time ?> - <?php echo $item->End_Time ?></td>
                    <td><?php echo $item->Location ?></td>
                    <td><?php echo $item->Ticket_Price ?> ,-</td>
                    <td>
                        <a href="/cms/eventItem?id=<?php echo $item->EventItem_ID ?>">
                        <img src="/icons/cms-table-edit.png" alt=""></a>
                    </td>
                    <td>
                        <a href="/cms/eventItem/deleteItem?id=<?php echo $item->EventItem_ID ?>&event=<?echo $uriEvent?>">
                        <img src="/icons/delete-item.png" alt=""></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</section>
</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->