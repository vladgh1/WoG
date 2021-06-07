<header>
	<section>
		<div class="logo--container">
			<a href="<?= URLROOT ?>/public/home/loggedIN" class="logo-text">Workout Generator</a>
		</div>
		<div class="header-login-register--container">
			<a href="<?= URLROOT ?>/public/users/settings">Settings</a>
			<a href="<?= URLROOT ?>/public/users/profile">Profile</a>
			<form action="<?= URLROOT ?>/public/users/logout" method="GET" class="header-login--form">
				<button name="logout">Logout</button>
			</form>
		</div>
	</section>
</header>