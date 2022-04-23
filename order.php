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
                รายการ Order
                <form class="form-inline my-2 my-lg-0 float-right ">
                    <?php
                    $stmt1 = $pdo->prepare("SELECT total_price,incomeexpense.IE_status FROM incomeexpense,ie_status WHERE incomeexpense.IE_status = ie_status.IE_status");
                    $stmt1->execute();

                    $total_income = 0;
                    $total_expense = 0;
                    while ($row1 = $stmt1->fetch()) {  ?>
                    <?php if ($row1['IE_status'] == 1) {
                            $total_income  = $total_income + $row1['total_price'];
                        } else {
                            $total_expense = $total_expense + $row1['total_price'];
                        }
                    } ?>
                    รายได้รวมของร้าน <?php echo $total_income; ?> บาท<br>
                    รายจ่ายรวมของร้าน <?php echo $total_expense; ?> บาท<br>
                    กำไรของร้าน <?php echo $total_income - $total_expense; ?> บาท
                </form>

            </div>
            <div class="card-header">
                <a href="stock.php "><input type="button" value="Stock" class="btn btn-success btn-sm"></a>
                <a href="recipes.php "><input type="button" value="สูตรอาหาร" class="btn btn-info btn-sm"></a>
                <a href="i_e.php "><input type="button" value="ประวัติรายรับ-รายจ่าย" class="btn btn-warning btn-sm"></a>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">รหัส Order</th>
                            <th scope="col">ชื่อผู้สั่ง Order</th>
                            <th scope="col">วัน/เดือน/ปี</th>
                            <th scope="col">รับ Order สินค้า</th>
                            <th scope="col">รายละเอียด Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $pdo->prepare("SELECT * FROM orders ");
                        $stmt->execute();

                        while ($row = $stmt->fetch()) { ?>

                            <tr>
                                <td><?= $row["order_id"] ?></td>
                                <td><?= $row["order_username"] ?></td>
                                <td><?= $row["order_date"] ?></td>
                                <td>
                                    <form action="stock_cheak.php" method="POST">
                                        <input type="hidden" name="order_id" value="<?= $row["order_id"] ?>">
                                        <input type="submit" value="รับออเดอร์" class="btn btn-primary btn-sm">
                                    </form>
                                </td>
                                <td>
                                    <form action="orderdetail.php" method="POST">
                                        <input type="hidden" name="order_id" value="<?= $row["order_id"] ?>">
                                        <input type="submit" value="รายละเอียด Order" class="btn btn-success btn-sm">
                                    </form>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>