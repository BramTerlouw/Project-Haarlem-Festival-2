<?php
require __DIR__ . '/../components/head.php';
?>

<div class="login-header">
</div>
<main>
    <h1 class="login-title">Content management system Haarlem Festival</h1>
    <form class="login-form" action="/cms/auth/validateAttempt" method="post">
        <div class="login-form-item">
            <label for="">Username</label>
            <input type="text" name="inputUsername" value="" placeholder="Enter username..." required>
        </div>
        <div class="login-form-item">
            <label for="">Password</label>
            <input type="password" name="inputPassword" value="" placeholder="Enter password..." required>
        </div>
        <div class="password-forgotten">
            <a href="/cms/auth/emailVerification">Password forgotten?</a>
        </div>
        <button name="submit" type="submit">Login</button>
    </form>
</main>
</body>

</html>