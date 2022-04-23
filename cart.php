<?php
include "Login/connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="Cart" content="width=device-width, initial-scale=1.0">

    <title>Cart</title>
    <?php
 
    include "navbar.php";
   
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];

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
                    <li class="nav-item active">
                        <a class="nav-link" href="product.php">ไทยบ้านกาแฟโบราณ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewprofile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="show_bill.php">Bill</a>
                    </li>
                </ul>
                <form action="Login/logout.php" method="POST" class="form-inline my-2 my-lg-0">
                    <?php include("customer.php"); ?>
                </form>
            </div>
        </nav>
        <!-- end navbar -->
        <div class="card product-card">
            <div class="card-header">
                รายการสินค้าในตะกร้า
            </div>
            <div class="card-header">
                <form action="save_order.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="hidden" name="order_cus_name" value="<?php echo $user_name; ?>">
                    <input type="submit" value="สั่งซื้อสินค้า" class="btn btn-warning btn-sm">
                </form><br>
                <a href="delete_all.php"><input type="button" value="ลบสินค้าทั้งหมด" class="btn btn-success btn-sm"></a>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">ลำดับ</th>
                            <th scope="col">รหัสสินค้า</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">ชนิดสินค้า</th>
                            <!-- <th scope="col">ชนิดสินค้า</th> -->
                            <th scope="col">ราคา</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">ราคารวม</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT cart_id,cart_foodname,cart_food_type,cart_price,cart_amount,foodid FROM cart");
                        $stmt->execute(); ?>


                        <?php while ($row = $stmt->fetch()) {  ?>
                            <form action="delete_check.php" method="POST">
                                <tr>
                                    <td><?= $row["cart_id"] ?></td>
                                    <td><?= $row["foodid"] ?></td>
                                    <td><?= $row["cart_foodname"] ?></td>
                                    <td><?= $row["cart_food_type"] ?></td>
                                    <td><?= $row["cart_price"] ?></td>
                                    <td><?= $row["cart_amount"] ?></td>
                                    <td><?= $row["cart_amount"] * $row["cart_price"] ?></td>
                                    <td>
                                        <input type="submit" value="ลบสินค้า" class="btn btn-primary btn-sm">
                                        <input type="hidden" name="cart_id" value="<?= $row["cart_id"] ?>">
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>