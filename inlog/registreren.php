<?php

@include 'config.php';

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'Gebruiker bestaat al!';
    } else {

        if ($pass != $cpass) {
            $error[] = 'Wachtwoord is onjuist!';
        } else {
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:index.php');
        }
    }
};


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
    <header class="header">
        <ul>
            <li> <a class="underlineHover" href="../index.html">Home</a> </li>
            <li> <a class="underlineHover" href="#recepten">Recepten</a></li>
            <li> <a class="underlineHover" href="ownpage.php">Mijn Recepten</a> </li>
        </ul>
        <a href="index.php"><i class="fa-solid fa-user"></i></a>
    </header>

    <main class="main">

        <div class="form-container">

            <form action="" method="post">
                <h3>Registreren</h3>
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    };
                };
                ?>
                <input type="text" name="name" required placeholder="Naam">
                <input type="email" name="email" required placeholder="Email">
                <input type="password" name="password" required placeholder="Wachtwoord">
                <input type="password" name="cpassword" required placeholder="Wachtwoord herhalen">
                <select name="user_type">
                    <option value="user">gebruiker</option>
                    <option value="admin">admin</option>
                </select>
                <input type="submit" name="submit" value="Registreren" class="form-btn">
                <p>Al een gebruiker? <a href="index.php">Inloggen</a></p>
            </form>

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