<?php
require __DIR__ . '/../components/head.php';
?>

<div class="login-header">
</div>
<main>
    <h1 class="login-title">Password recovery</h1>
    <form class="email-verification-container" action="/user/restorePassword" method="POST">

        <label class="lblEmailForgotten" for="inputMail">Enter email for verification</label>
        <input class="inputEmailForgotten" type="text" name="inputMail" value="Bram@hotmail.com" required>
        <button class="buttonEmailForgotten">Continue</button>

    </form>
</main>
</body>

</html>