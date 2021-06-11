<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APPNAME ?> - user profile</title>
    <link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/style.css'>
    <link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/header.css'>
    <link rel="stylesheet" href='<?= URLROOT ?>/public/src/css/leaderboard.css'>

</head>

<body>
    <?php include_once APPROOT . '/views/includes/loggedInHeader.php'; ?>
    <div class="leaderboard-table">
        <table>
            <tr>
                <td>Rank</td>
                <td>User</td>
                <td>Score</td>
            </tr>
            <?php

            $rank = 1;
            foreach ($data as $user => $score) {
                echo "<tr>";
                echo "<td>" . $rank++ . "</td>";
                echo "<td>" . $user . "</td>";
                echo "<td>" . $score . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <form method="post" action="<?= URLROOT ?>/public/users/generateJSON">
            <button type="submit">
                Generate JSON</button>
        </form>
        <form method="post" action="<?= URLROOT ?>/public/users/generatePDF">
            <button type="submit">
                Generate PDF</button>
        </form>
    </div>
</body>

</html>