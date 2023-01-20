<?php

session_start();

$_SESSION['rol'] = 1;

require 'functions.php';


if (isset($_POST['submit'])) {
    if ($_SESSION['rol'] == 1){
        $naam = "test";
        $text = $_POST["text"];
        $foto = "https://static.vecteezy.com/system/resources/thumbnails/002/534/006/small/social-media-chatting-online-blank-profile-picture-head-and-body-icon-people-standing-icon-grey-background-free-vector.jpg";
        
        
        
        $conn = dbConnect();
        
        
        $sql = "INSERT INTO reacties (naam,reactie,foto )
                VALUES (:naam, :reactie, :foto );";
        
        $statement = $conn->prepare($sql);
        $params = [
            'naam' => $naam,
            'reactie' => $text,
            'foto' => $foto,
        ];
        
        $statement -> execute($params);
    }
    else{
        echo "Je hebt geen rechten voor";
    }
    
}




$conn = dbConnect();


$result = $conn->query("SELECT * FROM `reacties`");





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
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/fork+kitchen+knife+icon-1320086368163404004.png">

    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
    <title>YouRecipe</title>
</head>

<body>
    <header class="header">
        <ul>
            <li> <a class="underlineHover" href="index.html">Home</a> </li>
            <li> <a class="underlineHover" href="recepten.html">Recepten</a></li>
            <li> <a class="underlineHover" href="inlog/gebruiker.php">Mijn Recepten</a> </li>
        </ul>
        <a href="inlog/index.php"><i class="fa-solid fa-user"></i></a>
    </header>
    <main class="main">
        <article class="recept">
            <img src="img/Pasta-met-kip-pesto-recept.jpg" alt="">
            <div>
                <div class="omschrijving">
                    <h2>Pasta Pesto</h2>
                    <p>Snipper het uitje en fruit even aan in een scheutje olijfolie. Voeg de blokjes kip toe en bak
                        ongeveer 5 minuten. Kook ondertussen de pasta gaar. Voeg de (zelfgemaakte) pesto en room toe aan
                        de kip en roer goed door. Proef nog even of er nog peper of zout bij moet.
                    </p>
                    <p>Laat de pestosaus een paar minuutjes zachtjes pruttelen. Voeg dan de gekookte pasta toe en schep
                        er doorheen. Halveer de tomaatjes en roer ook door de pasta pesto en verwarm nog een minuutje
                        mee. Serveer de pasta pesto in de pan of op een bord met een handje rucola en de geroosterde
                        pijnboompitten.
                    </p>
                    <p>
                        Tip: deze pasta pesto is ook lekker met geraspte kaas. Gebruik ook eens stukjes vegetarische kip
                        voor een vegetarische variant op de kip pesto.
                    </p>
                </div>
                <div class="recept-info">
                    <p>Bereidingstijd: 30 á 40 min</p>
                    <p>Voor 3 á 4 personen</p>
                    <p>Hoofdgerecht</p>
                    <div>
                        <h5>Benodigheden</h5>
                        <label for="">300 gr pasta</label>
                        <label for="">400 gr kipfilet (in stukjes)</label>
                        <label for="">1 ui</label>
                        <label for="">250 ml room</label>
                        <label for="">250 gr cherry tomaatjees</label>
                        <label for="">60g gr pijnboompitten</label>
                        <label for="">Handje rucola</label>
                        <label for=""> 4 eetlepels pesto</label>
                    </div>
                </div>
            </div>

        </article>

        <section class="recensies">
            <h2>Reacties</h2>

            <div>
                <article>
                    <img src="img/image.jfif" alt="">
                    <div>
                        <h3>Henk Schrader</h3>
                        <p>Lekker pasta en makkelijk te maken, alleen pas op met de kaas.</p>
                    </div>
                </article>
                <article>
                    <img src="img/image.jfif" alt="">
                    <div>
                        <h3>Henk Schrader</h3>
                        <p>Lekker pasta en makkelijk te maken, alleen pas op met de kaas.</p>
                    </div>
                </article>
                <article>
                    <img src="img/image.jfif" alt="">
                    <div>
                        <h3>Henk Schrader</h3>
                        <p>Lekker pasta en makkelijk te maken, alleen pas op met de kaas.</p>
                    </div>
                </article>
                <?php foreach ($result as $product) : ?>
                    <article>
                        <img src="<?php echo $product['foto']; ?>" alt="">
                        <div>
                            <h3><?php echo $product['naam']; ?></h3>
                            <p><?php echo $product['reactie']; ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <form class="review_form" method="POST" enctype="multipart/form-data">
                <label for="review"  >Geef je reactie
                    <textarea id="review" name="text" class="reactieschrijven"></textarea>
                </label>
                <button name="submit" class="button"><span>Stuur</span></button>
            </form>


        </section>
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