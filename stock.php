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
            </div>
            <div class="card-header">
                <a href="order.php "><input type="button" value="Order" class="btn btn-primary btn-sm"></a>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>รหัสสินค้า</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ขนาด</th>
                            <th>หน่วย</th>
                            <th>ชนิดสินค้า</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT stockID,stockName,stockPrice,stockAmount,stockSize,stockUnit,stocktypename FROM stock,stocktype WHERE stock.stocktypeid = stocktype.stocktypeid");
                        $stmt->execute();
                        while ($row = $stmt->fetch()) { ?>
                            <form method="POST" action="update_stock.php" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                <tr>
                                    <td><?= $row["stockID"] ?></td>
                                    <td><?= $row["stockName"] ?></td>
                                    <td><?= $row["stockPrice"] ?></td>
                                    <?Php if ($row["stockAmount"] == 0) { ?>
                                        <td class="amount-stock"><?= $row["stockAmount"] ?></td>
                                    <?php } else { ?>
                                        <td><?= $row["stockAmount"] ?></td>
                                    <?php } ?>
                                    <td><?= $row["stockSize"] ?></td>
                                    <td><?= $row["stockUnit"] ?></td>
                                    <td><?= $row["stocktypename"] ?></td>
                                    <td>
                                        <input type="hidden" name="stockID" value="<?= $row["stockID"] ?>">
                                        <?php if ($row["stockAmount"] == 0) { ?>
                                            <input type="submit" class="btn btn-primary btn-sm" value="เพิ่มสินค้า">
                                        <?php } else { ?>
                                            <input type="submit" disabled class="btn btn-info btn-sm" value="เพิ่มสินค้า">
                                        <?php } ?>
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>
                        </form>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>