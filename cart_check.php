
<?php
include "Login/connect.php";
include "navbar.php";
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("INSERT INTO cart(cart_foodname,cart_food_type,cart_price,cart_amount,user_id,foodid) VALUES(?,?,?,?,?,?)");
$stmt->bindParam(1, $_POST["cart_foodname"]);
$stmt->bindParam(2, $_POST["cart_food_type"]);
$stmt->bindParam(3, $_POST["cart_price"]);
$stmt->bindParam(4, $_POST["cart_amount"]);
$stmt->bindParam(5, $_POST["user_id"]);
$stmt->bindParam(6, $_POST["foodid"]);
$stmt->execute();

Header("Location: cart.php");

?>

