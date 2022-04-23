<?php
include "Login/connect.php";
session_start();

    $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $pdo->prepare("INSERT INTO incomeexpense(user_name,user_status,total_price,employee_sale,IE_status) VALUES(?,?,?,'Admin',2)");
                    $stmt->bindParam(1, $_POST["user_name"]);
                    $stmt->bindParam(2, $_POST["user_status"]);
                    $stmt->bindParam(3, $_POST["total_price"]);
                    $stmt->execute();
                    Header("Location: stock.php");
?>