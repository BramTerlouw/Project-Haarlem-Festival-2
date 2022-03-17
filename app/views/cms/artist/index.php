<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Artists:</h1>

<section class="artist-container">

<?php
foreach($artistList as $artist){?>
    <div class="artist-item">
        <div class="artist-img"><img class ="artist-image" src="/images/artists/<?php echo $artist->Artist_ID?>.png"></div>
        <div class="artist-form">
            <label for="inputArtistName">Name: </label>
            <input  type="text" name="inputArtistName" value = <?php echo $artist->Name ?>>
            <label for="inputArtistDescription">Description: </label>
            <textarea class="artist-textarea" name="inputArtistDescription" rows ="4"><?php echo $artist->Description ?></textarea>
            <label for="inputArtistType">Type: </label>
            <input type="text" name="inputArtistType" value = <?php echo $artist->Type ?>>
        </div>
        <button name="submit" type="submit">Edit</button>
    </div>
    <?php
}?>
</div>
</section>
    <!-- <div class="artist-item">
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
    </div> -->