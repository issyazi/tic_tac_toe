<?php
    session_start();
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
        <a href="start_pg.php">play</a>
        <a href="stat.php">statictic</a>
        <a href="../logout.php">exit</a>
    </header>
    <div class="content" style="justify-content: flex-start;">
        <div class="container" style="height: 200px; justify-content: center;">
            <div class="block-with-code">
                <p class="rule_descr" style="text-align: center; margin-top: 0">Game code:</p>
                <div class="rule code"><?= $_SESSION['room'] ?></div>
            </div>
            <h2 style="margin-top: 20px;">Waiting...</h2>
        </div>
        <div class="container" style="height: 200px; justify-content: center;">
            <div class="field" style="margin-top: 40px;">
                <div class="field-horizon">
                    <div class="field_block-1"></div>
                    <div class="field_block-2"></div>
                    <div class="field_block-3"></div>
                </div>
                <div class="field-horizon">
                    <div class="field_block-4"></div>
                    <div class="field_block-5"></div>
                    <div class="field_block-6"></div>
                </div>
                <div class="field-horizon">
                    <div class="field_block-7"></div>
                    <div class="field_block-8"></div>
                    <div class="field_block-9"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="../scripts/jquery.min.js"></script>
    <script>
        function check_guest(){
            $.ajax({
                url: "../php/check_guest.php",
                type: "post",
                success: function (data){
                    if (data === "joined"){
                        window.location.href = '../content/room.php';
                    }
                }
            })
        }
        setInterval(check_guest, 1000 / 5);
    </script>
</body>
</html>