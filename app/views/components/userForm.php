<? use Models\Role; ?>

<!-- Personal information section -->
<h1>Personal information</h1>
<form class="personal-info-form" action="/cms/user/updateOne" method="post">
    <div class="form-item <?php isSecureClass(false, $model->UserName, $model->Role)?>">
        <label for="userFullName">Full name:</label>
        <input type="text" name="userFullName" value="<?php echo $model->FullName ?>">
        <img src="/icons/cms-<?php isSecureIcon(false, $model->UserName, $model->Role)?>.png" alt="edit button">
    </div>
    <div class="form-item <?php isSecureClass(false, $model->UserName, $model->Role)?>">
        <label for="userCity">City:</label>
        <input type="text" name="userCity" value="<?php echo $model->City ?>">
        <img src="/icons/cms-<?php isSecureIcon(false, $model->UserName, $model->Role)?>.png" alt="edit button">
    </div>
    <div class="form-item <?php isSecureClass(false, $model->UserName, $model->Role)?>">
        <label for="userName">Username:</label>
        <input type="text" name="userName" value="<?php echo $model->UserName ?>">
        <img src="/icons/cms-<?php isSecureIcon(false, $model->UserName, $model->Role)?>.png" alt="edit button">
    </div>
    <div class="form-item <?php isSecureClass(false, $model->UserName, $model->Role)?>">
        <label for="userPostcode">Postcode:</label>
        <input type="text" name="userPostcode" value="<?php echo $model->PostCode ?>">
        <img src="/icons/cms-<?php isSecureIcon(false, $model->UserName, $model->Role)?>.png" alt="edit button">
    </div>
    <div class="form-item <?php isSecureClass(false, $model->UserName, $model->Role)?>">
        <label for="userBD">Birthdate:</label>
        <input type="date" name="userBD" value="<?php echo $model->BirthDate ?>">
        <img src="/icons/cms-<?php isSecureIcon(false, $model->UserName, $model->Role)?>.png" alt="edit button">
    </div>
    <div class="form-item <?php isSecureClass(false, $model->UserName, $model->Role)?>">
        <label for="userAddress">Address:</label>
        <input type="text" name="userAddress" value="<?php echo $model->Address ?>">
        <img src="/icons/cms-<?php isSecureIcon(false, $model->UserName, $model->Role)?>.png" alt="edit button">
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

    <div class="form-item <?php isSecureClass(true, $model->UserName, $model->Role)?>">
        <label for="userSuperV">Supervisor:</label>
        <input type="text" name="userSuperV" value="<?php echo $model->Supervisor ?>">
        <img src="/icons/cms-<?php isSecureIcon(true, $model->UserName, $model->Role)?>.png" alt="edit button">
    </div>
    
    <div class="form-item-dropdwn">
        <label for="userRole">Role:</label>
        
        <select name="userRole" <? if ($_SESSION['role'] == Role::Volunteer || ($_SESSION['role'] == Role::Admin && $_SESSION['userName'] != $model->UserName && $model->Role != Role::Volunteer->value)) echo "disabled" ?>>
            
            <? foreach (Role::cases() as $role) { ?>
                <option value="<? echo $role->value ?>" <? if ($model->Role == $role->value) echo "selected" ?>> 
                <? echo $role->value ?></option>
            <? } ?>

        </select>
    </div>

    <!-- Contact information section -->
    <h1>Contact information</h1>
    <div class="form-item <?php isSecureClass(false, $model->UserName, $model->Role)?>">
        <label for="userEmail">Email address:</label>
        <input type="email" name="userEmail" value="<?php echo $model->Email ?>">
        <img src="/icons/cms-<?php isSecureIcon(false, $model->UserName, $model->Role)?>.png" alt="edit button">
    </div>
    <div class="form-item <?php isSecureClass(false, $model->UserName, $model->Role)?>">
        <label for="userPhone">Phone number:</label>
        <input type="text" name="userPhone" value="<?php echo $model->PhoneNumber ?>">
        <img src="/icons/cms-<?php isSecureIcon(false, $model->UserName, $model->Role)?>.png" alt="edit button">
    </div>
    <div class="form-item secure">
        <label for="userID">ID:</label>
        <input type="text" name="userID" value="<?php echo $model->User_ID ?>">
        <img src="/icons/cms-secure.png" alt="edit button">
    </div>

    <!-- Password recovery section -->
    <h1>Password recovery</h1>
    <div class="form-item <?php isSecureClass(false, $model->UserName, $model->Role)?>">
        <label for="userPw">New password:</label>
        <input type="password" name="userPw" value="">
        <img src="/icons/cms-<?php isSecureIcon(false, $model->UserName, $model->Role)?>.png" alt="edit button">
    </div>

    <!-- custom cancel and submit buttons -->
    <div class="personal-info-btns-container">
        <a class="cms-cancel-xl" href="/cms/home">Cancel
            <img src="/icons/cms-cancel.png" alt="cancel icon">
        </a>
        <button class="cms-save-xl" name="submit" type="submit">Save changes
            <img src="/icons/cms-save.png" alt="cancel icon">
        </button>
    </div>
</form>