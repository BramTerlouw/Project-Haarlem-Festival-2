<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-cms.php';

function isSecureClass($secure, $userName) {
    // when it is a secure class, only admins can change it so check on role
    if ($secure == "true") {
        if ($_SESSION['role'] == "Volunteer") echo "secure";
    }

    // when not a secure class, volunteers can change it but only of it is class of own
    if ($secure == "false") {
        if ($_SESSION['userName'] != $userName && $_SESSION['role'] == "Volunteer") echo "secure";
    }
}

function isSecureIcon() {
    if ($_SESSION['role'] == "Volunteer") echo "secure"; else echo "edit-form";
}

require __DIR__ . '/../components/userForm.php';
?>


</main> <!-- close main tag from cms nav -->
</div>  <!-- close div of whole container from cms nav -->