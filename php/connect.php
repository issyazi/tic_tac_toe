<?php
    $conn = new mysqli("localhost", "root", "", "tic-tac-toe");

    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
