<?php global $ROOT; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Workout Generator</title>
	<link rel="stylesheet" href='<?= $ROOT; ?>/public/src/css/style.css'>
</head>

<body>

	<?php include '../public/src/components/header.php'; ?>
	<br>
	<section>
		<section class="error-container">
			<span>4</span>
			<span><span class="screen-reader-text">0</span></span>
			<span>4</span>
		</section>
	</section>

	<div class="tictactoe--container">
        <table id="board" class="board">
            <tr>
                <td id="one" class="even"></td>
                <td id="two"></td>
                <td id="three" class="even"></td>
            </tr>
            <tr>
                <td id="four"></td>
                <td id="five" class="even"></td>
                <td id="six"></td>
            </tr>
            <tr>
                <td id="seven" class="even"></td>
                <td id="eight"></td>
                <td id="nine" class="even"></td>
            </tr>
        </table>
    </div>
</body>

</html>