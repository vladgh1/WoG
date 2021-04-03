<?php
include '../public/src/components/header.php'
?>

<form action="" method="get" class="center--container">
    <h3>Generate now:</h3>
    <label for="luni">Luni</label>
    <div id ="luni">
        <input type="number" placeholder="Hours of workout(min)">
        <label for="Wtime">Workout Time(min):</label>
        <input type="range" id="Wtime" min=0 max=180 step=1>
        <p>P unde afisam timpul!!!</p>
        <label for="intensity">Workout Intensity:</label>
        <input name="intensity"type="range" min=0 max=1000 step=1>
    </div>
    

    <!-- <div>
        <select>
            <option value="">Type of workout</option>
            <option value="fitness">Fitness</option>
            <option value="endurance">Endurance</option>
            <option value="legDay">Leg Day</option>
            <option value="chestDay">Chest Day</option>
            <option value="backDay">Back Day</option>
            <option value="legDay"></option>
            <option value="chestDay">Chest Day</option>
            <option value="backDay">Back Day</option>
        </select>
    </div> -->
    <div class="main-login-register--container">
    <a href="<?=$ROOT?>/public/home/loggedIN" class="a--btn green--btn">JUST DO IT!</a>
    </div>
</form>

<footer>
</footer>
</body>

</html>