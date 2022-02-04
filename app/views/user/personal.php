<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/nav-cms.php';
?>

<!-- Personal information section -->
<h1>Personal information</h1>
<form class="personal-info-form" action="" method="post">
    <div class="form-item">
        <label for="">Full name:</label>
        <input type="text" name="" value="Bram Terlouw">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">City:</label>
        <input type="text" name="" value="Haarlem">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Username:</label>
        <input type="text" name="" value="Bram_Vol">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Postcode:</label>
        <input type="text" name="" value="1825 EF">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Birthdate:</label>
        <input type="date" name="" value="18-02-2000">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Address:</label>
        <input type="text" name="" value="Slotenmakerstraat 77">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>

    <div class="form-item-radiobtn">
        <h2>Gender</h2>
        <input type="radio" id="gender-male" name="gender" value="Male">
        <label for="gender-male">Male</label><br>

        <input type="radio" id="gender-female" name="gender" value="Female">
        <label for="gender-female">Female</label><br>

        <input type="radio" id="gender-other" name="gender" value="Other">
        <label for="gender-other">Other</label><br>
    </div>

    <div class="form-item secure">
        <label for="">Supervisor:</label>
        <input type="text" name="" value="Eef Stavenuiter">
        <img src="/icons/cms-secure.png" alt="edit button">
    </div>
    <div class="form-item secure">
        <label for="">Role:</label>
        <input type="text" name="" value="Volunteer">
        <img src="/icons/cms-secure.png" alt="edit button">
    </div>

    <!-- Contact information section -->
    <h1>Contact information</h1>
    <div class="form-item">
        <label for="">Email address:</label>
        <input type="email" name="" value="bram@test.com">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="">Phone number:</label>
        <input type="text" name="" value="06 23876534">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item secure">
        <label for="">ID:</label>
        <input type="text" name="" value="001">
        <img src="/icons/cms-secure.png" alt="edit button">
    </div>

    <!-- Password recovery section -->
    <h1>Password recovery</h1>
    <div class="form-item secure">
        <label for="">Current password:</label>
        <input type="password" name="" value="wachtwoord">
        <img src="/icons/cms-secure.png" alt="edit button">
    </div>

    <!-- custom cancel and submit buttons -->
    <div class="personal-info-btns-container">
        <a href="#">Cancel
            <img src="/icons/cms-cancel.png" alt="cancel icon">
        </a>
        <button type="submit">Save changes
            <img src="/icons/cms-save.png" alt="cancel icon">
        </button>
    </div>
</form>
</div>
</div>
</div>