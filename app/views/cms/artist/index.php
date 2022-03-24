<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Artists:</h1>

<section class="artist-container">
    <?php
    foreach ($artistList as $artist) { ?>
        <form action="/cms/artist/updateOne?id=<? echo $artist->Artist_ID ?>" method="post">
            <div class="artist-item">
                <div class="artist-img"><img class="artist-image" src="/images/artists/<?php echo $artist->Artist_ID ?>.png"></div>
                <div class="artist-form">
                    <label for="inputArtistName">Name: </label>
                    <input type="text" name="inputArtistName" value='<?php echo $artist->Name ?>'required>
                    <label for="inputArtistDescription">Description: </label>
                    <textarea class="artist-textarea" name="inputArtistDescription" rows="4" required>'<?php echo $artist->Description ?>'</textarea>
                    <label for="inputArtistType">Type: </label>
                    <input type="text" name="inputArtistType" value='<?php echo $artist->Type ?>'required>
                </div>
                <button type="submit" name="submit">Edit</button>
                </form>
                <form action="/cms/artist/deleteOne?id=<? echo $artist->Artist_ID ?>" method="post">
                <button type="delete" name="delete">Delete</button>
            </div>
        </form>
    <?php
    } ?>
    <form action="/cms/artist/insertOne" method="post">
        <div class="artist-item-add">
            <h1>Add artist:</h1>
            <div class="artist-form">
                <label for="inputArtistName">Name: </label>
                <input type="text" name="inputArtistName" required>
                <label for="inputArtistDescription">Description: </label>
                <textarea class="artist-textarea" name="inputArtistDescription" rows="4" required></textarea>
                <label for="inputArtistType">Type: </label>
                <input type="text" name="inputArtistType" required>
            </div>
            <button name="add" type="add">Add</button>
        </div>
    </form>
    </div>
</section>