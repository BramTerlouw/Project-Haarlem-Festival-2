<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-cms.php';
?>

<?php
$uriEvent = $_GET['event'];
?>

<section class="overview-container-info">

    <h1 class="overview-header"><?php echo ucfirst($uriEvent) ?> Event</h1>
    <div class="overview-info">
        <form action="">
            <div class="form-item">
                <label for="">Event name:</label>

                <input type="text" name="" value="<?php echo ucfirst($event->Name) ?> event">

                <img src="/icons/cms-edit-form.png" alt="edit button">
            </div>


            <div class="form-item">
                <label for="">Description:</label>

                <textarea name="" rows="6"><?php echo $event->Description ?></textarea>

            </div>

            <div class="form-item">
                <label for="">Date:</label>

                <input type="text" name="" value="<?php echo $event->StartDate ?>">
                <input type="text" name="" value="<?php echo $event->EndDate ?>">

                <img src="/icons/cms-edit-form.png" alt="edit button">
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
            <li><a class="btns-left-active" href="#">Thursday</a></li>
            <li><a href="">Friday</a></li>
            <li><a href="">Saturday</a></li>
            <li><a href="">Sunday</a></li>
        </ul>

        <ul class="overview-btns-right">
            <li>
                <a href="">
                    Add item
                    <img src="/icons/add-item.png" alt="add item">
                </a>
            </li>
            <li>
                <a href="">
                    Delete items
                    <img src="/icons/delete-item.png" alt="delete item">
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
            </tr>
            <?php foreach ($itemArr as $item) { ?>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td><?php echo $item->Name ?></td>
                    <td><?php echo $item->Start_Time ?> - <?php echo $item->End_Time ?></td>
                    <td><?php echo $item->Location ?></td>
                    <td><?php echo $item->Ticket_Price ?> ,-</td>
                    <td><a href="/cms/eventItem?id=<?php echo $item->EventItem_ID ?>"><img src="/icons/cms-table-edit.png" alt=""></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</section>
</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->