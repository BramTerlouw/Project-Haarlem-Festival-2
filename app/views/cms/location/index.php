<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Venues:</h1>

<section class="location-container">

    <?php
    foreach ($locationList as $location) { ?>
        <form action="/cms/location/updateOne?id=<? echo $location->Location_ID ?>" method="post">
            <div class="location-item">
                <div class="location-img"><img class="location-image" src="/images/locations/<?php echo $location->Location_ID ?>.png"></div>
                <div class="location-form">
                    <label for="inputLocationName">Name: </label>
                    <input type="text" name="inputLocationName" value='<?php echo $location->Name ?>'required>
                    <label for="inputLocationAddress">Address: </label>
                    <input type="text" name="inputLocationAddress" value='<?php echo $location->Address ?>'required>
                </div>
                <button type="submit" name="submit">Edit</button>
        </form>
        <form action="/cms/location/deleteOne?id=<? echo $location->Location_ID ?>" method="post">
            <button type="delete" name="delete">Delete</button>
            </div>
        </form>
    <?php
    } ?>

    <form action="/cms/location/insertOne" method="post">
        <div class="location-item-add">
            <h1>Add location:</h1>
            <div class="location-form">
                <label for="inputLocationName">Name: </label>
                <input type="text" name="inputLocationName" required>
                <label for="inputLocationAddress">Address: </label>
                <input type="text" name="inputLocationAddress" required>
            </div>
            <button name="add" type="add">Add</button>
        </div>
    </form>
    </div>
</section>