<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
}


require 'functions.php';

$conn = $functions->dbConnect();

$receptenfalse = $conn->query("SELECT * FROM `recepeten`");


?>


<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/fork+kitchen+knife+icon-1320086368163404004.png">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
    <script src="./js/script.js" defer></script>
    <title>YouRecipe</title>
</head>

<body>
    <header class="header">
        <ul class="header__list">
            <li class="header__listItem"> <a class="underlineHover" href="index.php">Home</a> </li>
            <li class="header__listItem"> <a class="underlineHover" href="index.php#recepten">Recepten</a> </li>
            <li class="header__listItem"> <a class="underlineHover" href="./gebruiker/">Mijn Recepten</a> </li>
        </ul>
        <a href="./gebruiker/"><i class="fa-solid fa-user header__icon"></i></a>
    </header>
    <div class="header__front">
        <div class="header__front--wrapper">
            <figure class="foodFig">
                <img class="foodFig__slides fade" src="img/Red_Pepper_Anchovy_Spaghetti-f46a58b.jpg" alt="spaghetti">
                <img class="foodFig__slides fade" src="img/Makkelijke-nasi-goreng.jpg" alt="Nasi">
                <img class="foodFig__slides fade" src="img/Risotto-met-garnalen-1-e1661796397448.jpg" alt="Risotto">
                <img class="foodFig__slides fade" src="img/The-Best-Classic-Tacos-550.jpg" alt="Taco's">
                <img class="foodFig__slides fade" src="img/what-to-serve-with-burgers-sq.webp" alt="">
                <img class="foodFig__slides fade" src="img/Pasta-met-kip-pesto-recept.jpg" alt="">
                <img class="foodFig__slides fade" src="img/download.jfif" alt="">

            </figure>
            <h1 class="header__h1">Your Recipe</h1>
        </div>

        <p class="header__h1--p">Welkom bij 'Your Recipe' hier kan je je eigen recepten delen en opzoek gaan naar andere lekkere recepten van andere thuis kok's! </p>
        <a href="recepten/receptmaker.php" class="button">Plaats je recept!</a>
    </div>
    <main id="recepten" class="main">
        <h1 class="main__h1">
            Recepten
        </h1>
        <section class="main__recepten">
            <?php foreach ($receptenfalse as $recept) : ?>
                <article class="receptMain">
                    <img class="receptMain__img" src="<?php echo "img/" . $recept["foto"] ?>" alt="">
                    <div class="receptMain__info">
                        <h3><?php echo $recept["naam"] ?></h3>
                        <p class="receptMain__ondertitel"><?php echo $recept["naammaker"] ?></p>
                        <p class="receptMain__text">
                            <?php echo $recept["kleininfo"] ?>
                        </p>
                    </div>
                    <a class="receptMain__linkOver" href="recepten/recept.php?id= <?php echo $recept["id"] ?>"></a>
                </article>
            <?php endforeach ?>
        </section>
    </main>
    <footer class="footer">
        <div>
        </div>
        <h4 class=""><a href="https://ma-web.nl/">&#169; Media College</a></h4>
    </footer>
</body>

</html>