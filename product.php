<?php
include "Login/connect.php";

session_start();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_sex = $_SESSION['user_sex'];
$user_status = $_SESSION['user_status'];
$status_name = $_SESSION['status_name'];
//$text_show = $_SESSION['text_error'];

if (empty($user_name)) {
    Header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="Product" content="width=device-width, initial-scale=1.0">

    <title>Product</title>
    <?php
    include "navbar.php";
    ?>
</head>

<body>
    <script language=JavaScript>
        function confirm() {
            alert('เพิ่มใส่ตะกร้าสำเร็จ');
        }
    </script>
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
                            <!--<th scope="col">รูปแบบสินค้า</th>-->
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT FoodID,FoodName,Foodtypename,food_price FROM food,foodtype WHERE food.Foodtypeid = foodtype.Foodtypeid 
                        AND (food.foodtypeid = '11' OR food.foodtypeid = '22' OR food.foodtypeid = '33')");

                        $stmt->execute();
                        while ($row = $stmt->fetch()) { 
                         $foodid = $row["FoodID"]; ?>

                            <form action="cart_check.php" method="POST">
                                <tr>

                                    <td><?= $row["FoodID"] ?></td>
                                    <td><img src='photo/product/<?= $row["FoodID"] ?>.png' width='200'></td>
                                    <td><?= $row["FoodName"] ?></td>
                                    <td><?= $row["Foodtypename"] ?></td>
                                    <td><?= $row["food_price"] ?></td>

                                    <td>
                                        <input type="hidden" class="form-control" name="cart_foodname" value="<?= $row["FoodName"] ?>">
                                        <input type="hidden" class="form-control" name="cart_food_type" value="<?= $row["Foodtypename"] ?>">
                                        <input type="hidden" class="form-control" name="cart_price" value="<?= $row["food_price"] ?>">
                                        <input class="form-control " name="cart_amount" type="number" min="1" required>
                                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" class="form-control" name="foodid" value="<?= $row["FoodID"] ?>">

                                    </td>
                                    <td>
                                        <?php
                                        $stmt1 = $pdo->prepare("SELECT stockAmount FROM stock WHERE foodid = '$foodid' ");
                                        $stmt1->execute();
                                        ($row1 = $stmt1->fetch()) ?>

                                        <?php if ($row1["stockAmount"] < 1) { ?>
                                            <input disabled type="submit" value="สินค้าหมด" class="btn btn-danger btn-sm">
                                        <?php } else { ?>
                                            <input type="submit" value="เพิ่มสินค้าลงตะกร้า" class="btn btn-primary btn-sm">
                                        <?php } ?>
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>

                        <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT FoodID,FoodName,Foodtypename,food_price FROM food,foodtype WHERE food.Foodtypeid = foodtype.Foodtypeid AND 
                       (food.Foodtypeid = 44 )");
                        $stmt->execute();

                        while ($row = $stmt->fetch()) {  
                            $foodid = $row["FoodID"]; ?>

                            <form action="cart_check.php" method="POST">
                                <tr>

                                    <td><?= $row["FoodID"] ?></td>
                                    <td><img src='photo/product/<?= $row["FoodID"] ?>.png' width='200'></a></td>
                                    <td><?= $row["FoodName"] ?></td>
                                    <td><?= $row["Foodtypename"] ?></td>
                                    <td><?= $row["food_price"] ?></td>

                                    <td>
                                        <input type="hidden" class="form-control" name="cart_foodname" value="<?= $row["FoodName"] ?>">
                                        <input type="hidden" class="form-control" name="cart_food_type" value="<?= $row["Foodtypename"] ?>">
                                        <input type="hidden" class="form-control" name="cart_price" value="<?= $row["food_price"] ?>">
                                        <input class="form-control " name="cart_amount" type="number" min="1" required>
                                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" class="form-control" name="foodid" value="<?= $row["FoodID"] ?>">
                                    </td>
                                    <td>
                                    <?php
                                        $stmt1 = $pdo->prepare("SELECT stockAmount FROM stock WHERE foodid = '$foodid' ");
                                        $stmt1->execute();
                                        ($row1 = $stmt1->fetch()) ?>

                                        <?php if ($row1["stockAmount"] < 1) { ?>
                                            <input disabled type="submit" value="สินค้าหมด" class="btn btn-danger btn-sm">
                                        <?php } else { ?>
                                            <input type="submit" value="เพิ่มสินค้าลงตะกร้า" class="btn btn-primary btn-sm">
                                        <?php } ?>
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>
                        <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT FoodID,FoodName,Foodtypename,food_price FROM food,foodtype WHERE food.Foodtypeid = foodtype.Foodtypeid 
                        AND (food.Foodtypeid = 55)");
                        $stmt->execute();

                        while ($row = $stmt->fetch()) {  
                         $foodid = $row["FoodID"]; ?>
                            <form action="cart_check.php" method="POST">
                                <tr>

                                    <td><?= $row["FoodID"] ?></td>
                                    <td><img src='photo/product/<?= $row["FoodID"] ?>.png' width='200'></a></td>
                                    <td><?= $row["FoodName"] ?></td>
                                    <td><?= $row["Foodtypename"] ?></td>
                                    <td><?= $row["food_price"] ?></td>

                                    <td>
                                        <input type="hidden" class="form-control" name="cart_foodname" value="<?= $row["FoodName"] ?>">
                                        <input type="hidden" class="form-control" name="cart_food_type" value="<?= $row["Foodtypename"] ?>">
                                        <input type="hidden" class="form-control" name="cart_price" value="<?= $row["food_price"] ?>">
                                        <input class="form-control " name="cart_amount" type="number" min="1" required>
                                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" class="form-control" name="foodid" value="<?= $row["FoodID"] ?>">
                                    </td>
                                    <td>
                                    <?php
                                        $stmt1 = $pdo->prepare("SELECT stockAmount FROM stock WHERE foodid = '$foodid' ");
                                        $stmt1->execute();
                                        ($row1 = $stmt1->fetch()) ?>

                                        <?php if ($row1["stockAmount"] < 1) { ?>
                                            <input disabled type="submit" value="สินค้าหมด" class="btn btn-danger btn-sm">
                                        <?php } else { ?>
                                            <input type="submit" value="เพิ่มสินค้าลงตะกร้า" class="btn btn-primary btn-sm">
                                        <?php } ?>
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