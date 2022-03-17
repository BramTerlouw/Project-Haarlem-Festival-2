<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Artists:</h1>

<section class="artist-container">

<?php
foreach($artistList as $artist){?>
    <div class="artist-item">
        <div class="artist-img"></div>
        <div class="artist-form">
            <label for="">Name: </label>
            <input type="text" value = <?php echo $artist["Name"] ?>>
            <label for="">Description: </label>
            <input type="text" value = <?php echo $artist["Description"]?>>
            <label for="">Type: </label>
            <input type="text" value = <?php echo $artist["Type"]?>>
        </div>
        <button>Edit</button>
    </div>
    <?php
}?>
</div>

    <div class="artist-item">
        <div class="artist-img"></div>
        <div class="artist-form">
            <label for="">Name: </label>
            <input type="text">
            <label for="">Description: </label>
            <input type="text">
            <label for="">Type: </label>
            <input type="text">
        </div>
        <button>Add</button>
    </div>