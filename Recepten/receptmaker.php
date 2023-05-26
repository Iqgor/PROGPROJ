<?php
session_start();


if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
    require '../functions.php';
    if (isset($_POST['submit'])) {



        $foto =  $_FILES['foto']['name'];
        $tempname = $_FILES['foto']['tmp_name'];
        $folder = "../img/" . $foto;

        move_uploaded_file($tempname, $folder);


        $naam = $_POST['naam'];
        $naammaker = $_SESSION['fname'];
        $recept = $_POST["recept"];
        $kleininfo = $_POST["kleininfo"];
        $benodigheden = $_POST["benodigheden"];
        $bereidingstijd = $_POST["bereidingstijd"];
        $personen = $_POST["personen"];
        $soort = $_POST["soort"];
        $gebruikerid = $_SESSION['id'];



        $conn = $functions->dbConnect();


        $sql = "INSERT INTO recepeten (foto,naam,naammaker,recept,kleininfo,benodigheden,
        bereidingstijd,personen,soort,gebruikerid)
                    VALUES (:foto, :naam, :naammaker, :recept, :kleininfo, :benodigheden,  
                    :bereidingstijd, :personen, :soort, :gebruikerid);";

        $statement = $conn->prepare($sql);
        $params = [
            'foto' => $foto,
            'naam' => $naam,
            'naammaker' => $naammaker,
            'recept' => $recept,
            'kleininfo' => $kleininfo,
            'benodigheden' => $benodigheden,
            'bereidingstijd' => $bereidingstijd,
            'personen' => $personen,
            'soort' => $soort,
            'gebruikerid' => $gebruikerid,
        ];

        $statement->execute($params);

        header("Location: ../gebruiker/"  );

    }
?>


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
        <script src="script.js" defer></script>
        <title>YouRecipe</title>
    </head>

    <body>

        <header class="header">
            <ul>
                <li> <a class="underlineHover" href="../index.php">Home</a> </li>
                <li> <a class="underlineHover" href="../index.php#recepten">Recepten</a> </li>
                <li> <a class="underlineHover" href="../gebruiker/">Mijn Recepten</a> </li>
            </ul>
            <a href="../gebruiker/"><i class="fa-solid fa-user"></i></a>
        </header>
        <main class="main">
            <form class="maken_form" method="POST" enctype="multipart/form-data">
                <h1>Maak hier je recept</h1>
                <label>Recept naam
                    <input class="search" type="text" name="naam" required>
                </label>
                <label for="">Foto
                    <input type="file" name="foto" accept="image/*" required>
                </label>
                <label for="">Werkwijze
                    <textarea name="recept" required></textarea>
                </label>
                <label for="">Omschrijving
                    <textarea name="kleininfo" required></textarea>
                </label>
                <label for="">Benodigheden
                    <textarea name="benodigheden" required></textarea>
                </label>
                <label for="">Bereidingstijd
                    <input class="search" min="0" max="100" name="bereidingstijd" type="number" required>
                </label>
                <label for="">Voor hoeveel personen:
                    <input class="search" min="0" max="10" name="personen" type="number" required>
                </label>
                <label for="">Soort gerecht
                    <select name="soort" required>
                        <option value="nagerecht">Nagerecht</option>
                        <option value="hoofgerecht">Hoofdgerecht</option>
                        <option value="voorgerecht">Voorgerecht</option>
                    </select>
                </label>
                <button name="submit" class="button"><span>Plaats</span></button>
            </form>
        </main>

    <?php } else {
    header("Location: ../inlog");
    exit;
} ?>
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