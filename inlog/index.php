<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="../img/fork+kitchen+knife+icon-1320086368163404004.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
            <li class="header__listItem"> <a class="underlineHover" href="../Gebruiker/">Mijn Recepten</a> </li>
        </ul>
        <a href="index.php"><i class="fa-solid fa-user header__icon"></i></a>
    </header>

    <main class="main">
        <div class="main__form">
            <form class="form" action="php/index.php" method="post">
                <h4 class="">Inloggen</h4><br>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="form__alert" role="alert">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php } ?>

                <div class="form__field">
                    <label for="naam">Gebruikersnaam</label>
                    <input id="naam" autocomplete="off" class="form__field--input" type="text" class="" name="uname" value="<?php echo (isset($_GET['uname'])) ? $_GET['uname'] : "" ?>">
                </div>

                <div class="form__field">
                    <label for="ww">Wachtwoord</label>
                    <input id="ww" autocomplete="off" class="form__field--input" type="password" class="" name="pass">
                </div class="form__field">

                <button class="button" type="submit" class="">Inloggen</button>
                <a href="registreren.php" class="form__link">Aanmelden</a>


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