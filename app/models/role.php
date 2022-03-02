<?php 

namespace Models;

enum Role: string {
    case Volunteer = 'Volunteer';
    case Admin = 'Admin';
    case Superadmin = 'Superadmin';
}

?>