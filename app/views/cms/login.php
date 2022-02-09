<?php
require __DIR__ . '/../components/head.php';
?>

<div class="login-header">
</div>
<main>
    <h1 class="login-title">Content management system Haarlem Festival</h1>
    <form class="login-form" action="/cms/loginValidation" method="post">
        <div class="login-form-item">
            <label for="">Username</label>
            <input type="text" name="inputUsername" placeholder="Username..." required>
        </div>
        <div class="login-form-item">
            <label for="">Password</label>
            <input type="password" name="inputPassword" placeholder="Password..." required>
        </div>
        <div class="password-forgotten">
            <a href="#">Password forgotten?</a>
        </div>
        <button name="submit" type="submit">Login</button>
    </form>
</main>
</body>

</html>