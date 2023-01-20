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
    <link rel="stylesheet" href="../assets/main.css">
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
            <?php
            if (isset($_SESSION['message'])){
                echo '<p class="err">'.$_SESSION['message'].'</p>';
                unset($_SESSION['message']);
            }
            ?>
            <form method="post" action="../php/join.php" style="height: 130px">
                <input type="text" class="code_input" name='room_id' placeholder="Введите код игры" style="width: 396px; border: 2px solid #4469b483;">
                <button type="submit" class="main_btn">Подключиться к комнате</button>
            </form>
        </div>
    </div>
</body>
</html>