<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-cms.php';
use Models\Role;

function isSecureClass($secure, $userName, $userRole) {
    if ($secure && $_SESSION['role'] == Role::Volunteer) echo "secure";
    elseif ($_SESSION['userName'] != $userName && $_SESSION['role'] == Role::Volunteer) echo "secure";
    elseif ($_SESSION['userName'] != $userName && $_SESSION['role'] == Role::Admin && $userRole != Role::Volunteer->value) echo "secure";
}

function isSecureIcon($secure, $userName, $userRole) {
    if ($secure && $_SESSION['role'] == Role::Volunteer) echo "secure";
    else if ($_SESSION['userName'] != $userName && $_SESSION['role'] == Role::Volunteer) echo "secure";
    else if ($_SESSION['userName'] != $userName && $_SESSION['role'] == Role::Admin && $userRole != Role::Volunteer->value) echo "secure";
    else echo "edit-form";
}

require __DIR__ . '/../components/userForm.php';
?>


</main> <!-- close main tag from cms nav -->
</div>  <!-- close div of whole container from cms nav -->