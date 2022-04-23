<?php
include "Login/connect.php";
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="earch" content="width=device-width, initial-scale=1.0">

    <title>Search</title>
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
                        <a class="nav-link" href="product.php">ไทยบ้านกาแฟโบราณ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewprofile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
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

        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");

        $stmt = $pdo->prepare("SELECT FoodID,FoodName,Foodtypename,food_price FROM food,foodtype WHERE food.Foodtypeid = foodtype.Foodtypeid AND 
                        (FoodName LIKE '%" . $_POST["keywords"] . "%' )");
        $stmt->execute();
        $row = $stmt->fetch();

        if (empty($row)) { ?>
            <div class="container">
                <div class="card-body col-md-14">
                    <div class="card login-form">
                        <form action="product.php" method="POST">
                            <div class="card-header text-center">
                                ไม่มีสินค้าที่ค้นหา
                            </div><br>
                            <div class="text-center">
                                <input type="submit" value="Go to Product page" class="btn btn-danger btn-sm">
                            </div><br>
                        </form>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="card product-card">
                <div class="card-header">
                    รายการสินค้า
                    <form action="search.php" method="POST" class="form-inline my-2 my-lg-0 float-right ">
                        <input class="form-control" type="text" name="keywords" style="width:200px;" placeholder="Search">
                        <input type="submit" value="  " class="btn btn-warning btn-sm form-control">
                    </form>
                </div>
                <div class="card-header">
                    เมนู
                    <a href="menucoffee.php" class="login-form">กาแฟ</a>
                    <a href="menumilk.php">นม</a>
                    <a href="menutea.php" class="login-form">ชา</a>
                    <a href="menusoda.php">น้ำโซดา</a>
                    <a href="menufruit.php" class="login-form">น้ำผลไม้</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">รหัสสินค้า</th>
                                <th scope="col">ภาพสินค้า</th>
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col">ชนิดสินค้า</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">จำนวน</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <?php $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                        $stmt1 = $pdo->prepare("SELECT FoodID,FoodName,Foodtypename,food_price FROM food,foodtype WHERE food.Foodtypeid = foodtype.Foodtypeid AND 
                        (FoodName LIKE '%" . $_POST["keywords"] . "%' )");
                        $stmt1->execute();
                        while ($row1 = $stmt1->fetch()) {
                            $foodid = $row1["FoodID"]; ?>
                            <tbody>
                                <form action="cart_check.php" method="POST">
                                    <tr>
                                        <td><?= $row1["FoodID"] ?></td>
                                        <td><img src='photo/product/<?= $row1["FoodID"] ?>.png' width='200' id="FoodID"></a></td>
                                        <td><?= $row1["FoodName"] ?></td>
                                        <td><?= $row1["Foodtypename"] ?></td>
                                        <td><?= $row1["food_price"] ?></td>

                                        <td>
                                            <input type="hidden" class="form-control" name="cart_foodname" value="<?= $row1["FoodName"] ?>">
                                            <input type="hidden" class="form-control" name="cart_food_type" value="<?= $row1["Foodtypename"] ?>">
                                            <input type="hidden" class="form-control" name="cart_price" value="<?= $row1["food_price"] ?>">
                                            <input class="form-control " name="cart_amount" type="number" min="1" required>
                                            <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
                                            <input type="hidden" class="form-control" name="food_id" value="<?= $row1["FoodID"] ?>">
                                        </td>
                                        <td>
                                            <?php
                                            $stmt2 = $pdo->prepare("SELECT stockAmount FROM stock WHERE foodid = '$foodid' ");
                                            $stmt2->execute();
                                            ($row2 = $stmt2->fetch()) ?>

                                            <?php if ($row2["stockAmount"] < 1) { ?>
                                                <input disabled type="submit" value="สินค้าหมด" class="btn btn-danger btn-sm">
                                            <?php } else { ?>
                                                <input type="submit" value="เพิ่มสินค้าลงตะกร้า" class="btn btn-primary btn-sm">
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>