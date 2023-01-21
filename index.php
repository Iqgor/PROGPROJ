<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
}

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
    <script src="script.js" defer></script>
    <title>YouRecipe</title>
</head>

<body>
    <header class="header">
        <ul>
            <li> <a class="underlineHover" href="index.php">Home</a> </li>
            <li> <a class="underlineHover" href="recepten.php">Recepten</a></li>
            <li> <a class="underlineHover" href="inlog/gebruiker.php">Mijn Recepten</a> </li>
        </ul>
        <a href="inlog/gebruiker.php"><i class="fa-solid fa-user"></i></a>
    </header>
    <div class="header--div">
        <div>
            <figure class="foodFig">
                <img class="mySlides fade" src="img/Red_Pepper_Anchovy_Spaghetti-f46a58b.jpg" alt="spaghetti">
                <img class="mySlides fade" src="img/Makkelijke-nasi-goreng.jpg" alt="Nasi">
                <img class="mySlides fade" src="img/Risotto-met-garnalen-1-e1661796397448.jpg" alt="Risotto">
                <img class="mySlides fade" src="img/The-Best-Classic-Tacos-550.jpg" alt="Taco's">
                <img class="mySlides fade" src="img/what-to-serve-with-burgers-sq.webp" alt="">
                <img class="mySlides fade" src="img/Pasta-met-kip-pesto-recept.jpg" alt="">
                <img class="mySlides fade" src="img/download.jfif" alt="">

            </figure>
            <h1 class="h1">Your Recipe</h1>
        </div>

        <p class="h1--p">Welkom bij 'Your Recipe' hier kan je je eigen recepten delen en opzoek gaan naar andere lekkere recepten van andere thuis kok's! </p>
        <a href="inlog/receptmaker.php" class="button">Plaats je recept!</a>
    </div>
    <main id="recepten" class="main">
        <h2 class="main--h2">
            Populaire Recepten
        </h2>
        <div class="recepten">
            <article class="main--art">
                <img src="img/Makkelijke-nasi-goreng.jpg" alt="">
                <div class="info">
                    <h3>Lorem Ipsum</h3>
                    <p class="ondertitel">Henk Willems</p>
                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis accusamus provident consequatur iusto. Facilis aliquid soluta commodi maxime cum sapiente exercitationem, sint necessitatibus sed provident placeat, a reprehenderit quos possimus.
                    </p>
                </div>
                <div class="links">
                    <a class="button" href="recept.php">Kook nu!</a>
                    <a class="underlineHover" href="">Zet in mijn recepten.</a>
                </div>
            </article>


        </div>
    </main>
    <footer class="footer">
        <div>
            <a href=""><i class="fa-brands fa-facebook-f"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-pinterest-p"></i></a>
        </div>
        <h4 class=""><a href="https://ma-web.nl/">&#169; Media College</a></h4>
    </footer>
</body>

</html>