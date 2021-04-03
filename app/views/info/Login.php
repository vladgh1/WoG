<?php
include '../public/src/components/header.php'
?>

<form action="" method="get" class="center--container">
    <h3>Login now:</h3>
    <input type="text" placeholder="Username">
    <input type="password" placeholder="Password">
    <div class="main-login-register--container">
    <a href="<?=$ROOT?>/public/home/loggedIN" class="a--btn green--btn">Login</a>
        <a href="<?=$ROOT?>/public/info/register" class="a--btn gray--btn">Or register instead</a>
    </div>
</form>

<footer>
</footer>
</body>

</html>