<?php
    session_start();
    include_once ("../php/connect.php");

    if (isset($_SESSION['room'])){
        $room_id = $_SESSION['room'];
        $query = "delete from rooms where id='$room_id'";
        mysqli_query($conn, $query);
        unset($_SESSION['host']);
        unset($_SESSION['guest']);
        unset($_SESSION['room']);
    }

    if (!isset($_SESSION['user'])){
        header("Location: start_pg.php");
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
    <script src="../scripts/dropMenu.js"></script>
</head>
<body>
    <header>
        <a href="start_pg.php">Главная</a>
        <a href="stat.php">Статистика</a>
        <a href="../logout.php">Выход</a>
    </header>
    <div class="content">
        <div class="container" style="height: 200px;">
            <h2>Противник покинул комнату</h2>
            <button onclick="window.location.href='start_pg.php'" class="main_btn"></button>
        </div>
    </div>
</body>
</html>