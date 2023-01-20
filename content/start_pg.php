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
        header("Location: ../index.php");
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
        <a href="start_pg.php">play</a>
        <a href="stat.php">statictic</a>
        <a href="../php/logout.php">exit</a>
    </header>

    <div class="content1">
        <div class="container">
            <form method="post" action="../php/host_room.php" style="height: auto">
                <button type="submit" class="main_btn">New room</button>
            </form>
            <button class="main_btn" onclick="window.location.href = 'conn_room.php';">Join room</button>
        </div>
    </div>
</body>
</html>