<?php
class Controller {
    
    function displayView($model) {        
        $directory = substr(get_class($this), 0, -10);
        $view = debug_backtrace()[1]['function'];
        require __DIR__ . "/../views/$directory/$view.php";
    }

    function setPermission($role) {
        if ($role == 'Volunteer') { $_SESSION['role'] = Role::Volunteer; } 
        elseif ($role == 'Admin') { $_SESSION['role'] = Role::Admin; } 
        else { $_SESSION['role'] = Role::Superadmin; }
    }

}