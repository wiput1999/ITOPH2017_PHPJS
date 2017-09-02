<?php

$dsn = "mysql:host=localhost;dbname=nvieti;";
$pdo = new PDO($dsn, "nvieti", "WantSomeLove");
$pdo->query("SET NAMES utf8");

?>