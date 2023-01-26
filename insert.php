<?php
    mb_internal_encoding("utf8");

    $pdo = new PDO("mysql:host=localhost;dbname=lesson17", "root", "");

    $sql = $pdo->prepare("insert into 4each_keijiban values(?, ?, ?)");

    $sql->execute([$_POST["handlename"], $_POST["title"], $_POST["comments"]]);

    header("Location:./index.php");
?>