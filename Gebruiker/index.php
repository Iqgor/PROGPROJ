<?php


session_start();


if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {


    require '../functions.php';

    $conn = $functions->dbConnect();

    $id = $_SESSION['id'];

    $receptenfalse = $conn->query("SELECT * FROM `recepeten` WHERE gebruikerid= $id");

    if (isset($_POST['verwijder'])) {

        $id = $_POST['verwijder'];

        $sql = "DELETE FROM `recepeten` WHERE `recepeten`.`id` = $id";

        $conn->query($sql);

        header("Location: gebruiker.php");
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
        <link rel="icon" href="../img/fork+kitchen+knife+icon-1320086368163404004.png">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
        <script src="../main.js" defer></script>
        <title>YouRecipe</title>
    </head>

    <body>
        <header class="header">
            <ul>
                <li> <a class="underlineHover" href="../index.php">Home</a> </li>
                <li> <a class="underlineHover" href="../index.php#recepten">Recepten</a> </li>
                <li> <a class="underlineHover" href="gebruiker.php">Mijn Recepten</a> </li>
            </ul>
            <a href="index.php"><a href="../inlog/uitloggen.php" class="">
                    Uitloggen
                </a></i></a>
        </header>

        <main class="main">

            <div class="profile_head">
                <div>
                    <h2 class="profile_h2">Welkom <?= $_SESSION['fname'] ?> </h2>
                    <a href="../Recepten/receptmaker.php" class="button">Maak recept</a>
                </div>

            </div>
            <div class="artsprof">
                <?php foreach ($receptenfalse as $recept) : ?>
                    <article class="artprof">
                        <div class="artprof-inner">
                            <div class="artprof-front">
                                <h3><?php echo $recept['naam'] ?></h3>
                                <img src="<?php echo "../img/" . $recept['foto'] ?>" alt="<?php echo $recept['naam'] ?>">
                            </div>
                            <div class="artprof-back">
                                <p>
                                    <?php echo $recept['kleininfo'] ?>

                                </p>
                                <a class="button" href="../recepten/recept.php?id=<?php echo $recept['id'] ?>">Kook nu!</a>
                                <a href="../recepten/recepteditor.php?id=<?php echo $recept['id'] ?>">verander recept</a>
                                <button class="verwijder" id="verwijder"><i class="fa-solid fa-x"></i></button>
                                <div id="overlay" class="overlay">
                                    <h4>Wil je echt verwijderen?</h4>
                                    <form method="POST">
                                        <button name="verwijder" class="verwijder1"value="<?php echo $recept['id']; ?>">Ja</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach ?>
            </div>

    </body>

<?php } else {
    header("Location: ../inlog");
    exit;
} ?>
</main>
<footer class="footer">
    <div>
    </div>
    <h4 class=""><a href="https://ma-web.nl/">&#169; Media College</a></h4>
</footer>
</body>

    </html>