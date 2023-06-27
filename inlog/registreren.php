<!DOCTYPE html>
<html lang="nl">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="icon" href="../img/fork+kitchen+knife+icon-1320086368163404004.png">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
	<script src="../script.js" defer></script>
	<title>YouRecipe</title>
</head>

<body>
	<header class="header">
		<ul class="header__list">
			<li class="header__listItem"> <a class="underlineHover" href="../index.php">Home</a> </li>
			<li class="header__listItem"> <a class="underlineHover" href="../index.php#recepten">Recepten</a> </li>
			<li class="header__listItem"> <a class="underlineHover" href="../gebruiker/">Mijn Recepten</a> </li>
		</ul>
		<a href="index.php"><i class="fa-solid fa-user header__icon"></i></a>
	</header>

	<main class="main">

		<div class="main__form">

			<form class="form" action="php/registreren.php" method="post">

				<h4>Account aanmaken</h4><br>
				<?php if (isset($_GET['error'])) { ?>
					<div class="form__alert2" role="alert">
						<?php echo $_GET['error']; ?>
					</div>
				<?php } ?>

				<?php if (isset($_GET['success'])) { ?>
					<div class="form__alert2" role="alert">
						<?php echo $_GET['success']; ?>
					</div>
				<?php } ?>
				<div class="form__field">
					<label for="naam" class="">Naam</label>
					<input id="naam" autocomplete="off" type="text" class="form__field--input" name="fname" value="<?php echo (isset($_GET['fname'])) ? $_GET['fname'] : "" ?>">
				</div>

				<div class="form__field">
					<label for="gnaam" class="">Gebruikersnaam</label>
					<input id="gnaam" autocomplete="off" class="form__field--input" type="text" name="uname" value="<?php echo (isset($_GET['uname'])) ? $_GET['uname'] : "" ?>">
				</div>

				<div class="form__field">
					<label for="ww" class="">Wachtwoord</label>
					<input id="ww" class="form__field--input" type="password" name="pass">
				</div>

				<button class="button" type="submit" class="">Aanmelden</button>
				<a href="index.php" class="form__link">Inloggen</a>
			</form>
		</div>

	</main>
	<footer class="footer">
		<div>

		</div>
		<h4 class=""><a href="https://ma-web.nl/">&#169; Media College</a></h4>
	</footer>
</body>

</html>