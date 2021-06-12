<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APPNAME ?> - Congratulations</title>
    <link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
    <link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
    <link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/statistics.css'>
</head>

<body>
    
    <?php require_once APPROOT . '/views/includes/loggedInHeader.php'; ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
    $result =preg_replace("/[^0-9.]/", "", $_GET['total']);
    echo  "Congratulations you have earned: ".$result . " points!";
    ?>
</body>

</html>