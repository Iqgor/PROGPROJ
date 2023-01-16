<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
    <title>YouRecipe</title>
</head>

<body>
    <main class="main">
        <div class="container">
            <div class="content">
                <h3>Hallo, <span>user</span></h3>
                <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
                <p>this is an user page</p>
                <a href="../index.html" class="btn">Home</a>
                <a href="#" class="btn">Mijn recepten</a>
                <a href="uitloggen.php" class="btn">Uitloggen</a>
            </div>
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