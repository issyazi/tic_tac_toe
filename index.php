<?php
    session_start();
    include_once ("php/connect.php");

    if (isset($_SESSION['room'])){
        $room_id = $_SESSION['room'];
        $query = "delete from rooms where id='$room_id'";
        mysqli_query($conn, $query);
        unset($_SESSION['host']);
        unset($_SESSION['guest']);
        unset($_SESSION['room']);
    }

    if (isset($_SESSION['user'])){
        header("Location: content/start_pg.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tic-Tac-Toe</title>
    <link rel="stylesheet" href="assets/main.css">
    <script src="scripts/dropMenu.js"></script>
</head>
<body>
    <header>
        <a href="start_pg.php">Главная</a>
        <a href="profile/signIn.php">enter</a>
        <a href="profile/signUp.php">registration</a>
    </header>

    <div class="content">
        <div class="container">
            <button class="main_btn" onclick="window.location.href = 'profile/signUp.php';">new room</button>
            <button class="main_btn" onclick="window.location.href = 'profile/signUp.php';">join room</button>
        </div>
    </div>
</body>
</html>