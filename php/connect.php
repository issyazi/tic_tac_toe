<?php
    $conn = new mysqli("localhost", "root", "", "meow");

    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
