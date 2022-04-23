<?php
include "Login/connect.php";
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_status = $_SESSION['user_status'];

// ดึงข้อมูลในตะกร้า
$pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("SELECT cart_foodname,cart_food_type,cart_price,cart_amount,user_id,foodID FROM cart");
$stmt->execute();

$row = $stmt->fetch();

if (!empty($row)) {
    $stmt = $pdo->prepare("SELECT cart_foodname,cart_food_type,cart_price,cart_amount,user_id,foodID FROM cart");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        $food_name = $row['cart_foodname'];
        $food_type = $row['cart_food_type'];
        $food_price = $row['cart_price'];
        $food_amount = $row['cart_amount'];
        $user_id = $row['user_id'];
        $foodid = $row['foodID'];

        echo "cart_foodname = " . $food_name . "<br>";
        echo "cart_food_type = " . $food_type . "<br>";
        echo "cart_price = " . $food_price . "<br>";
        echo "cart_amount =" . $food_amount . "<br>";
        echo "user_id = " . $user_id . "<br>";
        echo "foodid = " . $foodid . "<br>";
    }
    // เพิ่ม Order
    $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO orders (user_id,order_username) VALUES(?,?)");
    $stmt->bindParam(1, $_POST["user_id"]);
    $stmt->bindParam(2, $_POST["order_cus_name"]);
    $stmt->execute();

    $stmt0 = $pdo->prepare("SELECT order_id FROM orders");
    $stmt0->execute();
    while ($row0 = $stmt0->fetch()) {
        $order_id = $row0['order_id'];
    }

    $stmt4 = $pdo->prepare("INSERT INTO bill(order_id,user_id,bill_status) VALUES('$order_id','$user_id',0)");
    $stmt4->execute();

    $stmt1 = $pdo->prepare("SELECT cart_foodname,date,cart_food_type,cart_price,cart_amount,user_id,foodID FROM cart");
    $stmt1->execute();
    while ($row1 = $stmt1->fetch()) {
        $food_name = $row1['cart_foodname'];
        $food_type = $row1['cart_food_type'];
        $food_price = $row1['cart_price'];
        $food_amount = $row1['cart_amount'];
        $user_id = $row1['user_id'];
        $foodid = $row1['foodID'];
        $total = $total + ($food_price * $food_amount);

        $stmt = $pdo->prepare("INSERT INTO orders_detail VALUES('NULL','$order_id','$food_name','$food_type','$food_price','$food_amount','$user_id','$foodid')");
        $stmt->execute();

    }

    $stmt5 = $pdo->prepare("INSERT INTO ie_customer_works(user_name,user_status,total_price,IE_status,order_id) VALUES('$user_name','$user_status','$total',1,'$order_id')");
        $stmt5->execute();

    Header("Location: bill.php");
} else {
}
