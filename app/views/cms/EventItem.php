<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-cms.php';
?>

<?php echo $_GET['id']; ?>

<section class="eventItem-info-container">
    <div class="eventItem-info">
        
        <h1>Program item information:</h1>
        
        <div class="form-item">
            <label for="">Name activity:</label>

            <input type="text" name="" value="event">

            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>


        <div class="form-item-dropdwn">
            <label for="">Location:</label>

            <select name="" id="">
                <option value="">Kaas</option>
                <option value="">Kees</option>
            </select>
        </div>


        <div class="form-item">
            <label for="">Performers:</label>

            <p><strong>performer 1</strong></p>
            <p><strong>performer 2</strong></p>

            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>


        <div class="form-item">
            <label for="">Description:</label>
            
            <textarea name="" rows="6">this is a Description</textarea>
            
        </div>
        
    </div>
    <div class="eventItem-picture"></div>
</section>

<!-- <section class="eventItem-progam-container">

</section> -->


</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->