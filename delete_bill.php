<?php
include "Login/connect.php";
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("DELETE FROM bill WHERE bill_id = ?");
$stmt->bindParam(1, $_POST["bill_id"]);
$stmt->execute();

Header("Location: show_bill.php");