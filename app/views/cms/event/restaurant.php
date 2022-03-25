<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';

function converseDate($date)
{
    $timestmp = strtotime($date);
    return date("l", $timestmp);
}
?>

<?php
$uriEvent = $_GET['event'];
//dit is een test commit omdat bram dan kan mergen.
?>

<section class="overview-container-info restaurant-margin">

    <h1 class="overview-header">Event overview:</h1>
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
            <a href="">Add</a>
        </ul>

    </div>

<div class="table-wrapper">
        <table class="event-item-table">
            <tr>
                <th></th>
                <th>Restaurant</th>
                <th>Address</th>
                <th>Seats</th>
                <th>Price</th>
                <th>Price(-12)</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($restaurantlist as $restaurant) { ?>
                <tr>
                    <td></td>
                    <td><? echo $restaurant->Name?></td>
                    <td><? echo $restaurant->Adres?></td>
                    <td><? echo $restaurant->Max_visitors?></td>
                    <td><? echo $restaurant->Price_Adults?></td>
                    <td><? echo $restaurant->Price_Children?></td>
                    <td>
                        <a href="#">
                        <img src="/icons/cms-table-edit.png" alt=""></a>
                    </td>
                    <td>
                        <a href="#">
                        <img src="/icons/delete-item.png" alt=""></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>


</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->