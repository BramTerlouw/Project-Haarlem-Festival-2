<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/nav-cms.php';
?>

<?php
$event = $_GET['event'];
?>

<section class="overview-container-info">
    
    <h1 class="overview-header"><?php echo ucfirst($event) ?> Event</h1>
    <div class="overview-info">
    <div class="form-item">
        <label for="">Event name:</label>
        <input type="text" name="" value="test">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Genre:</label>
        <input type="text" name="" value="test">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Description:</label>
        <input type="text" name="" value="test">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Date:</label>
        <input type="text" name="" value="test">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Location(s):</label>
        <input type="text" name="" value="test">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Location(s):</label>
        <input type="text" name="" value="test">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Location(s):</label>
        <input type="text" name="" value="test">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Location(s):</label>
        <input type="text" name="" value="test">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    </div>
    
    <div class="overview-image">
        
    </div>

</section>

<section class="overview-container-table">
    
    <div class="overview-btn-container">
        
        <ul>
            <li><a href="#">Thursday</a></li>
            <li><a href="">Friday</a></li>
            <li><a href="">Saturday</a></li>
            <li><a href="">Sunday</a></li>
        </ul>

    </div>
    <div class="table">
        table
    </div>

</section>
</main> <!-- close main tag from cms nav -->
</div>  <!-- close div of whole container from cms nav -->