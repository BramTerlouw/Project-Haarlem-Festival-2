<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Venues:</h1>

<section class="location-container">

<?php
foreach($locationList as $location){?>
    <div class="location-item">
        <div class="location-img"><img class ="location-image" src="/images/locations/<?php echo $location->Name?>.png"></div>
        <div class="location-form">
            <label for="inputlocationName">Name: </label>
            <input  type="text" name="inputlocationName" value = '<?php echo $location->Name ?>'>
            <label for="inputLocationAddress">Address: </label>
            <input type="text" name="inputLocationAddress" value = '<?php echo $location->Address ?>'>
        </div>
        <a href="/cms/location?id=<? echo $location->Location_ID?>"name="submit" type="submit">Edit</a>
    </div>
    <?php
}?>
<div class="location-item">
        <div class="location-form">
            <label for="inputlocationName">Name: </label>
            <input  type="text" name="inputlocationName">
            <label for="inputLocationAddress">Address: </label>
            <input type="text" name="inputLocationAddress">
        </div>
        <button name="submit" type="submit">Add</button>
    </div>
</div>
</section>