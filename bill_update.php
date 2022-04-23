<?php
include "connect.php";

                    $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $pdo->prepare("INSERT INTO bill(bill_status) VALUES(0)");
                    $stmt->execute();

                    Header("Location: delete_all.php");
?>