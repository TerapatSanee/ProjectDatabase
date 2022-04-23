<?php
include "Login/connect.php";
session_start();
// ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
// if (empty($_SESSION["emp_email"])) {
//     header("location: index.php");
// }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="พิ่มสินค้าใน stock" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>เพิ่มสินค้าใน stock</title>
</head>

<body>
    <?php
    include "navbar.php";
    ?>

    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM stock,stocktype WHERE stock.stocktypeid = stocktype.stocktypeid AND stockID = ?");
    $stmt->bindParam(1, $_POST["stockID"]);
    $stmt->execute();

    $row = $stmt->fetch();

    ?>

    <form action="update_stock_check.php" method="POST">
        <div class="container">
            <div class="card login-form">
                <div class="card-header text-center">
                    เพิ่มสินค้า
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">รหัสสินค้า</label>
                        <div class="col-md-9">
                            <input type="text" value="<?= $row["stockID"] ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">ชื่อสินค้า</label>
                        <div class="col-md-9">
                            <input type="text" value="<?= $row["stockName"] ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">ชนิด</label>
                        <div class="col-md-9">
                            <input type="text" value="<?= $row["stocktypename"] ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">จำนวน</label>
                        <div class="col-md-9">
                            <input type="number" min="1" name="stockAmount" class="form-control" required autofocus>
                            <input type="hidden" name="stockID" value="<?= $row["stockID"] ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"></label>
                        <div class="col-md-9">
                            <input type="submit" value="เพิ่มสินค้า" class="btn btn-danger btn-sm">
                            </form>
                            <a href="stock.php"><input type="button" value="BACK" class="btn btn-primary btn-sm"></a>
                        </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
   
</body>

</html>