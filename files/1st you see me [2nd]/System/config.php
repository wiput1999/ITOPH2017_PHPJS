<?php
error_reporting(E_ALL & ~E_NOTICE);
$host = "localhost";
$user = "siline";
$pass = "Stuckbars";
$dbname = "siline";
$pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $pass);