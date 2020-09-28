<?php
$dsn = "mysql:host=localhost;dbname=demo;charset=utf8";
$username = "root";
$password = "";
try {
       $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
       $error_message = $e->getMessage();
}

