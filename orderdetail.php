<?php
include "Login/connect.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="Order_Detai" content="width=device-width, initial-scale=1.0">

    <title>Order_Detail</title>
    <?php
    include "navbar.php";

    ?>
</head>

<body>
    <div class="container-fluid">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href=""><img src='photo/profile/LOGO.png' width='100'></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active ">
                        <a class="nav-link">ไทยบ้านกาแฟโบราณ<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- end navbar -->
        <div class="card product-card">
            <div class="card-header">
                ข้อมูล Order
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">รหัส Order</th>
                            <th scope="col">รหัสผู้สั่ง Order</th>
                            <th scope="col">ชื่อผู้สั่ง Order</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">ชนิดสินค้า</th>
                            <th scope="col">ราคาสินค้า</th>
                            <th scope="col">จำนวนสินค้า</th>
                            <th scope="col">ราคารวมทั้งหมด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT orders_detail.order_id,food_name,food_type,food_price,food_amount,foodid,orders_detail.user_id,user_name FROM orders_detail,users 
                        WHERE orders_detail.user_id = users.user_id AND order_id = ?");
                        $stmt->bindParam(1, $_POST["order_id"]);
                        $stmt->execute();
                        $total = 0;
                        while ($row = $stmt->fetch()) {  
                            $total = $total + ($row["food_price"] * $row["food_amount"]);   ?>
                            <tr>
                                <td><?= $row["order_id"] ?></td>
                                <td><?= $row["user_id"]  ?></td>
                                <td><?= $row["user_name"]  ?></td>
                                <td><?= $row["food_name"]  ?></td>
                                <td><?= $row["food_type"]  ?></td>
                                <td><?= $row["food_price"]  ?></td>
                                <td><?= $row["food_amount"]  ?></td>
                                <td><?= ($row["food_price"] * $row["food_amount"]);  ?></td>
                            </tr>

                        <?php } ?>
                        <tr>
                            <td colspan="6">
                            <td>Total</td>
                            <td><?php echo number_format($total, 2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                            <td><a href="order.php"><input type=button class="btn btn-primary btn-sm" value='BACK'></a></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>