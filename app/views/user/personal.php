<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/nav-cms.php';

function isSecureClass() {
    if ($_SESSION['role'] == "Volunteer") echo "secure";
}

function isSecureIcon() {
    if ($_SESSION['role'] == "Volunteer") echo "secure"; else echo "edit-form";
}
?>

<!-- Personal information section -->
<h1>Personal information</h1>
<form class="personal-info-form" action="" method="post">
    <div class="form-item">
        <label for="">Full name:</label>
        <input type="text" name="" value="<?php echo $model->FullName ?>">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">City:</label>
        <input type="text" name="" value="<?php echo $model->City ?>">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Username:</label>
        <input type="text" name="" value="<?php echo $model->UserName ?>">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Postcode:</label>
        <input type="text" name="" value="<?php echo $model->PostCode ?>">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Birthdate:</label>
        <input type="date" name="" value="<?php echo $model->BirthDate ?>">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Address:</label>
        <input type="text" name="" value="<?php echo $model->Address ?>">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>

    <div class="form-item-radiobtn">
        <h2>Gender</h2>
        <input type="radio" id="gender-male" name="gender" value="Male" <?php if ($model->Gender == "Male") echo "Checked" ?>>
        <label for="gender-male">Male</label><br>

        <input type="radio" id="gender-female" name="gender" value="Female" <?php if ($model->Gender == "Female") echo "Checked" ?>> <!-- !!!! -->
        <label for="gender-female">Female</label><br>

        <input type="radio" id="gender-other" name="gender" value="Other" <?php if ($model->Gender == "Other") echo "Checked" ?>>
        <label for="gender-other">Other</label><br>
    </div>

    <div class="form-item <?php isSecureClass()?>">
        <label for="">Supervisor:</label>
        <input type="text" name="" value="<?php echo $model->Supervisor ?>">
        <img src="/icons/cms-<?php isSecureIcon()?>.png" alt="edit button">
    </div>
    <div class="form-item <?php isSecureClass()?>">
        <label for="">Role:</label>
        <input type="text" name="" value="<?php echo $model->Role ?>">
        <img src="/icons/cms-<?php isSecureIcon()?>.png" alt="edit button">
    </div>

    <!-- Contact information section -->
    <h1>Contact information</h1>
    <div class="form-item">
        <label for="">Email address:</label>
        <input type="email" name="" value="<?php echo $model->Email ?>">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Phone number:</label>
        <input type="text" name="" value="<?php echo $model->PhoneNumber ?>">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item <?php isSecureClass()?>">
        <label for="">ID:</label>
        <input type="text" name="" value="<?php echo $model->User_ID ?>">
        <img src="/icons/cms-<?php isSecureIcon()?>.png" alt="edit button">
    </div>

    <!-- Password recovery section -->
    <h1>Password recovery</h1>
    <div class="form-item <?php isSecureClass()?>">
        <label for="">Current password:</label>
        <input type="password" name="" value="<?php echo $model->Password ?>">
        <img src="/icons/cms-<?php isSecureIcon()?>.png" alt="edit button">
    </div>

    <!-- custom cancel and submit buttons -->
    <div class="personal-info-btns-container">
        <a href="/cms">Cancel
            <img src="/icons/cms-cancel.png" alt="cancel icon">
        </a>
        <button type="submit">Save changes
            <img src="/icons/cms-save.png" alt="cancel icon">
        </button>
    </div>
</form>
</main> <!-- close main tag from cms nav -->
</div>  <!-- close div of whole container from cms nav -->