<?php
include "Login/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="Order" content="width=device-width, initial-scale=1.0">

    <title>Order</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="order.php">ไทยบ้านกาแฟโบราณ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewprofile.php">Profile</a>
                    </li>
                </ul>
                <form action="Login/logout.php" method="POST" class="form-inline my-2 my-lg-0">
                    <?php include("employee.php"); ?>
                </form>
            </div>
        </nav>
        <!-- end navbar -->
        <div class="card product-card">
            <div class="card-header">
                สูตรอาหาร
            </div>
            <div class="card-header">
                <a href="order.php "><input type="button" value="Order" class="btn btn-primary btn-sm"></a>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>รหัสวัตถุดิบ</th>
                            <th>ชื่อวัตถุดิบ</th>
                            <th>ชื่อสินค้า</th>
                            <th>จำนวน</th>
                            <th>ขนาด</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT food_recipes.stockID,stockName,recipes_size,stock.foodID,foodName FROM food_recipes,stock,food WHERE food_recipes.stockID = stock.stockID AND stock.FoodID = food.foodID");
                        $stmt->execute();
                        while ($row = $stmt->fetch()) { ?>
                            <tr>
                                <td><?= $row["stockID"] ?></td>
                                <td><?= $row["stockName"] ?></td>
                                <td><?= $row["foodName"] ?></td>
                                <td>1</td>
                                <td><?= $row["recipes_size"] ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>

</html>