<?php
session_start();


if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
    require '../functions.php';

    $conn = $functions->dbConnect();

    if(!isset($_GET['id'])) {
        echo ("de id is niet gezet");
        exit;
    }
    
    $id = $_GET['id'];
    
    $check_int = filter_var($id, FILTER_VALIDATE_INT);
    if ($check_int === false) {
        echo ("dit is geen getal");
        exit;
    }
    
    $statement2 = $conn->prepare("SELECT * FROM `recepeten` WHERE id= ?");
    $params2 = [$id];
    
    $statement2 -> execute($params2);
     
    $place = $statement2->fetch(PDO::FETCH_ASSOC);
    if (isset($_POST['submit'])) {
        
        
        $conn = $functions->dbConnect();

        $naam = $_POST['naam'];
        $recept = $_POST["recept"];
        $kleininfo = $_POST["kleininfo"];
        $benodigheden = $_POST["benodigheden"];
        $bereidingstijd = $_POST["bereidingstijd"];
        $personen = $_POST["personen"];
        $soort = $_POST["soort"];

        $sql = "UPDATE `recepeten` SET `naam` = ' {$naam} ', `recept` = ' {$recept} ', `kleininfo` = ' {$kleininfo} ', `benodigheden` = ' {$benodigheden} ', `bereidingstijd` = ' {$bereidingstijd} ', `personen` = ' {$personen} ' , `soort` = ' {$soort} ' WHERE `recepeten`.`id` = $id";



        $conn->query($sql);

        header("Location: /recept.php?id=" . $id  );
    
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
            <ul class="header__list">
                <li class="header__listItem"> <a class="underlineHover" href="../index.php">Home</a> </li>
                <li class="header__listItem"> <a class="underlineHover" href="../index.php#recepten">Recepten</a> </li>
                <li class="header__listItem"> <a class="underlineHover" href="../gebruiker/">Mijn Recepten</a> </li>
            </ul>
            <a href="../gebruiker/"><i class="fa-solid fa-user header__icon"></i></a>
        </header>
        <main class="main">
            <form class="builder" method="POST" enctype="multipart/form-data">
                <h1>Verander hier je recept</h1>
                <label class="builder__label">Recept naam
                    <input class="builder__label--text" value="<?php echo $place["naam"];?>" type="text" name="naam">
                </label>
                <label class="builder__label">Werkwijze
                    <textarea class="builder__textArea" name="recept"><?php echo $place["recept"];?></textarea>
                </label>
                <label class="builder__label">Omschrijving
                    <textarea class="builder__textArea" name="kleininfo"><?php echo $place["kleininfo"];?></textarea>
                </label>
                <label class="builder__label">Benodigheden
                    <textarea class="builder__textArea" name="benodigheden"><?php echo $place["benodigheden"];?></textarea>
                </label>
                <label class="builder__label">Bereidingstijd
                    <input class="builder__label--text builder__label--number" min="0" max="100" value="<?php echo $place["bereidingstijd"];?>" name="bereidingstijd" type="number">
                </label>
                <label class="builder__label">Voor hoeveel personen:
                    <input class="builder__label--text builder__label--number" min="0" max="10" value="<?php echo $place["personen"];?>" name="personen" type="number">
                </label>
                <label class="builder__label">Soort gerecht
                    <select class="builder__select" selected="<?php echo $place["soort"];?>" name="soort">
                        <option value="nagerecht">Nagerecht</option>
                        <option value="hoofgerecht">Hoofdgerecht</option>
                        <option value="voorgerecht">Voorgerecht</option>
                    </select>
                </label>
                <button name="submit" class="builder__button"><span>Verander</span></button>
            </form>
        </main>

    <?php } else {
    header("Location: ../index.php");
    exit;
} ?>
    <footer class="footer">
        <div>
        </div>
        <h4 class=""><a href="https://ma-web.nl/">&#169; Media College</a></h4>
    </footer>
    </body>

    </html>