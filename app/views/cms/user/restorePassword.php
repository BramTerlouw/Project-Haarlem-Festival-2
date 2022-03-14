<?php
require __DIR__ . '/../../components/head.php';
?>

<div class="login-header">
</div>
<main>
    <h1 class="login-title">Password recovery</h1>
    <form class="password-form" action="/cms/user/setPassword?email=<? echo $email ?>" method="post">
        
        <div class="password-form-item">
            <label for="inputPassword">New password:</label>
            <input type="password" name="inputPassword" value="" required>
        </div>

        <div class="password-form-item">
            <label for="inputConfirmPassword">Confirm password:</label>
            <input type="password" name="inputConfirmPassword" value="" required>
        </div>

        <button name="submit" type="submit">Login</button>
    </form>
</main>
</body>
</html>