<?php
require __DIR__ . '/../components/head.php';
?>

<div class="login-header">
</div>
<main>
    <h1 class="login-title">Content management system Haarlem Festival</h1>
    <form class="login-form" action="/user/loginValidation" method="post">
        <div class="login-form-item">
            <label for="">Username</label>
            <input type="text" name="inputUsername" value="Bram_Vol" required>
        </div>
        <div class="login-form-item">
            <label for="">Password</label>
            <input type="password" name="inputPassword" value="wachtwoord" required>
        </div>
        <div class="password-forgotten">
            <a href="/user/emailVerification">Password forgotten?</a>
        </div>
        <button name="submit" type="submit">Login</button>
    </form>
</main>
</body>

</html>