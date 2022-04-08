<?php

namespace Controllers;
use Models\Role;

class Controller {

    // ## set permissions of user
    function setPermission($role) {
        if ($role == 'Volunteer') { $_SESSION['role'] = Role::Volunteer; } 
        elseif ($role == 'Admin') { $_SESSION['role'] = Role::Admin; } 
        else { $_SESSION['role'] = Role::Superadmin; }
    }
}