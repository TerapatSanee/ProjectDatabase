<?php
include "Login/connect.php";
$pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("DELETE FROM cart WHERE cart_id = ?");
$stmt->bindParam(1, $_POST["cart_id"]);
$stmt->execute();

Header("Location: cart.php");
