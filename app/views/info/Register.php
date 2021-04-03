<?php
include '../public/src/components/header.php'
?>

<form action="" method="get" class="center--container">
    <h3>Register now:</h3>
    <input type="text" placeholder="Username">
    <input type="email" placeholder="Email">
    <input type="password" placeholder="Password">
    <input type="password" placeholder="Confirm Password">
    <input type="number" placeholder="Age">
    <select default>
        <option value="Not yet confirmed...">--Please choose a gender role--</option>
        <option value="Attack Helicopter">Attack Helicopter</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Bruh....">Other</option>
    </select>

    <div>
        <input type="number" placeholder="Height">
        <select>
            <option value="cm">CM</option>
            <option value="feet/inches">Feet/Inches</option>
        </select>
    </div>

    <div>
        <input type="number" placeholder="Weight">
        <select>
            <option value="kg">Kg</option>
            <option value="pounds">Pounds</option>
        </select>
    </div>
    <div class="main-login-register--container">
        <a href="<?=$ROOT?>/public/home/loggedIN" class="a--btn green--btn">Register</a>
        <a href="<?=$ROOT?>/public/info/login" class="a--btn gray--btn">Or login instead</a>
    </div>
</form>
<footer>
</footer>
</body>

</html>