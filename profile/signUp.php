<?php
    session_start();
    if (isset($_SESSION['user'])){
        header("Location: ../content/start_pg.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tic-Tak-Toe</title>
    <link rel="stylesheet" href="../assets/main.css">
    <script src="../scripts/dropMenu.js"></script>
</head>
<body>
    <header>
        <a href="../index.php">Главная</a>
        <a href="signIn.php">Вход</a>
        <a href="signUp.php">Регистрация</a>
    </header>

    <div class="content">
        <div class="container">
            <?php
            if (isset($_SESSION['message'])){
                echo '<p class="err">'.$_SESSION['message'].'</p>';
                unset($_SESSION['message']);
            }
            ?>
            <form method="post" action="../php/register.php">
                <div class="prof_inp">
                    <label>Логин</label>
                    <input type="text" name="login" placeholder="Введите логин" maxlength="16">
                </div>
                <div class="prof_inp">
                    <label>Пароль</label>
                    <input type="password" name="password" placeholder="Введите пароль" maxlength="128">
                </div>
                <div class="prof_inp">
                    <label>Подтвердите пароль</label>
                    <input type="password" name="submit_password" placeholder="Введите пароль" maxlength="128">
                </div>
                <button type="submit" class="main_btn prof_btn">Зарегистрироваться</button>
            </form>
            <p class="call">Есть аккаунт? – <a href="signIn.php">авторизация</a></p>
        </div>
    </div>
</body>
</html>