<?php
session_start();
if ($_SESSION['status'] != true) {
	header("Location: index.php");
}
?>
<header>
	<section>
		<div class="logo--container">
			<a href="<?= $ROOT ?>/public/home/loggedIN" class="logo-text">Workout Generator</a>
		</div>
		<div class="header-login-register--container">
			<form method="POST">
				<button name="logout">Logout</button>
			</form>
		</div>
	</section>
</header>

<?php
if (isset($_POST['logout'])) {
	if (isset($_REQUEST['logout'])) {
		session_destroy();
		header("Location: index");
		exit();
	}
}
?>