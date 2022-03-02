<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-cms.php';
use Models\Role;
?>

<h1>Users:</h1>
<div class="users-table-container">
<table class="users-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($users as $user) { ?>
        <tr>
            <td><? echo $user->User_ID ?></td>
            <td><? echo $user->UserName ?></td>
            <td><? echo $user->FullName ?></td>
            <td><? echo $user->Email ?></td>
            <td><? echo $user->PhoneNumber ?></td>
            <td><? echo $user->Role ?></td>
            <td><a href="<? if ($_SESSION['role'] == Role::Superadmin) echo "/user/deleteOne?id=" . $user->User_ID?>">Delete</a></td>
            <td><a href="/user/edit?userName=<?echo $user->UserName ?>">Edit</a></td>
        </tr>
        <? } ?>
    </tbody>
</table>
</div>
<section class="users-table-btnContainer">
    <a href="<? if ($_SESSION['role'] == Role::Superadmin) echo "/user/add" ?>">Add user</a>
    <a href="">Export</a>
</section>

</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->