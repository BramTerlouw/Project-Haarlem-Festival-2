<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Artists:</h1>

<section class="artist-container">
    <?php
    foreach ($artistList as $artist) { ?>
        <div class="artist-item">
        <div class="artist-img-wrapper"><img src="/images/artists/<?php echo $artist->Artist_ID ?>.png" alt="artist img" onerror="this.src='/images/artists/fallback.png'"> </div>
            <form class="artist-form" action="/cms/artist/updateOne?id=<? echo $artist->Artist_ID ?>" method="post">
                <label for="inputArtistName">Name: </label>
                <input type="text" name="inputArtistName" value='<?php echo $artist->Name ?>'required>
                <label for="inputArtistDescription">Description: </label>
                <textarea name="inputArtistDescription" rows="4" required><?php echo $artist->Description ?></textarea>
                <label for="inputArtistType">Type: </label>
                <input type="text" name="inputArtistType" value='<?php echo $artist->Type ?>'required>
                <button type="submit" class="artist-cms-button" name="submit">Edit</button>
            </form>
            <form action="/cms/artist/deleteOne?id=<? echo $artist->Artist_ID ?>" method="post">
                <button type="delete" class="artist-cms-button" name="delete">Delete</button>
            </form>
    </div>
    <?php
    } ?>
    <div class="artist-item">
    <h1>Add artist:</h1>
            <form class="artist-form" action="/cms/artist/insertOne" method="post">
                <label for="inputArtistName">Name: </label>
                <input type="text" name="inputArtistName" autocomplete="off" value=''required>
                <label for="inputArtistDescription">Description: </label>
                <textarea name="inputArtistDescription" rows="4" required></textarea>
                <label for="inputArtistType">Type: </label>
                <input type="text" name="inputArtistType" autocomplete="off" value=''required>
                <button name="add" class="artist-cms-button" type="add">Add</button>
            </form>
    </div>
</section>