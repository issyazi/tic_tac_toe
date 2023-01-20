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

    $login = $_SESSION['user'];
    $query = mysqli_query($conn, "select * from users where login='$login'");
    $user = $query->fetch_assoc();
    $user_id = $user['id'];

    $query = mysqli_query($conn, "select * from stats where user_id='$user_id'");
    $stats = $query->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tic-Tak-Toe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/main.css">
    <script src="../scripts/dropMenu.js"></script>
</head>
<body>
    <header>
        <a href="start_pg.php">Главная</a>
        <div class="drop_menu">
            <button onclick="dropMenu()" class="dropbtn">account</button>
            <div id="myDropdown" class="dropdown-content">
                <p style="font-weight: 900;"><?= $_SESSION['user'] ?></p>
                <a>statictic</a>
                <a href="../php/logout.php">exit</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="container" style="height: 600px;">
            <div class="stat_h">STATICTIC</div>
            <div class="stat_table">
                <div class="stat_cont">
                    <div class="stat_label">games</div>
                    <div class="stat_num"><?= $stats['win'] + $stats['lose'] + $stats['draw'] ?></div>
                </div>
                <hr>
                <div class="stat_cont">
                    <div class="stat_label">win</div>
                    <div class="stat_num"><?= $stats['win'] ?></div>
                </div>
                <hr>
                <div class="stat_cont">
                    <div class="stat_label">loss</div>
                    <div class="stat_num"><?= $stats['lose'] ?></div>
                </div>
                <hr>
                <div class="stat_cont">
                    <div class="stat_label">draw</div>
                    <div class="stat_num"><?= $stats['draw'] ?></div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</body>
</html>