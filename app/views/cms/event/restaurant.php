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
?>

<section class="overview-container-info">

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

<!-- <section class="overview-container-table">

   
</section> -->


</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->