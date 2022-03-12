<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Add new user:</h1>
<form class="personal-info-form" action="/cms/user/insertOne" method="post">
    <div class="form-item">
        <label for="userFullName">Full name:</label>
        <input type="text" name="userFullName" value="">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="userCity">City:</label>
        <input type="text" name="userCity" value="">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="userName">Username:</label>
        <input type="text" name="userName" value="">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="userPostcode">Postcode:</label>
        <input type="text" name="userPostcode" value="">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="userBD">Birthdate:</label>
        <input type="date" name="userBD" value="1990-01-01">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="userAddress">Address:</label>
        <input type="text" name="userAddress" value="">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>

    <div class="form-item-radiobtn">
        <h2>Gender</h2>
        <input type="radio" id="gender-male" name="gender" value="Male" checked>
        <label for="gender-male">Male</label><br>

        <input type="radio" id="gender-female" name="gender" value="Female">
        <label for="gender-female">Female</label><br>

        <input type="radio" id="gender-other" name="gender" value="Other">
        <label for="gender-other">Other</label><br>
    </div>

    <div class="form-item">
        <label for="userSuperV">Supervisor:</label>
        <input type="text" name="userSuperV" value="">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    
    <div class="form-item-dropdwn">
        <label for="userRole">Role:</label>
        <select name="userRole">
            <option value="Volunteer">Volunteer</option>
            <option value="Admin">Admin</option>
            <option value="Superadmin">Superadmin</option>
            </select>
    </div>

    <!-- Contact information section -->
    <h1>Contact information</h1>
    <div class="form-item">
        <label for="userEmail">Email address:</label>
        <input type="email" name="userEmail" value="">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="userPhone">Phone number:</label>
        <input type="text" name="userPhone" value="">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>

    <!-- Password recovery section -->
    <h1>Password</h1>
    <div class="form-item">
        <label for="userPw">New password:</label>
        <input type="password" name="userPw" value="">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>
    <div class="form-item">
        <label for="userPw">Confirm password:</label>
        <input type="password" name="userConfirmPw" value="">
        <img src="/icons/cms-edit-form.png" alt="edit button">
    </div>

    <!-- custom cancel and submit buttons -->
    <div class="personal-info-btns-container">
        <a href="/cms/user">Cancel
            <img src="/icons/cms-cancel.png" alt="cancel icon">
        </a>
        <button name="submit" type="submit">Add user
            <img src="/icons/cms-save.png" alt="cancel icon">
        </button>
    </div>
</form>


</main> <!-- close main tag from cms nav -->
</div>  <!-- close div of whole container from cms nav -->