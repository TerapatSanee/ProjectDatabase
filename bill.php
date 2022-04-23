<?php
session_start();
// ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
// if (empty($_SESSION["emp_email"])) {
//     header("location: index.php");
// }
?>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">

<head>

    <?php
    include "Login/connect.php";
    include "navbar.php";
    $user_name = $_SESSION['user_name'];
    ?>

    <title>Bill</title>
</head>

<body>
    <div class="card product-card">
        <div class="card-header text-center">
            ใบเสร็จสินค้า
        </div>
        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">ชื่อผู้ซื้อ</th>
                        <th scope="col">วัน/เดื่อน/ปี/เวลา</th>
                        <th scope="col">รหัสสินค้า</th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ราคารวม</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $pdo->prepare("SELECT cart_foodname,date,cart_price,cart_amount,foodid FROM cart");
                    $stmt->execute();

                    $total = 0;
                    $total_amount = 0;

                    ?>
                    <?php while ($row = $stmt->fetch()) { ?>
                    <form action="delete_all.php" method="POST">
                        <?php $total = $total + ($row["cart_price"] * $row["cart_amount"]);
                        $total_amount = $total_amount + $row["cart_amount"]
                        ?>

                        <tr>
                            <td><?php echo $user_name; ?></td>
                            <td><?= $row["date"] ?></td>
                            <td><?= $row["foodid"] ?></td>
                            <td><?= $row["cart_foodname"] ?></td>
                            <td><?= $row["cart_amount"] ?></td>
                            <td><?= ($row["cart_price"] * $row["cart_amount"]); ?></td>

                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3">
                        <td>Total</td>
                        <td><?php echo number_format($total_amount); ?></td>
                        <td><?php echo number_format($total, 2); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        <div class="text-center">
            <input type="submit" class="btn btn-danger btn-sm" value="Go to Product page" onclick="confirm()" class="login-form">
    </form>
    <script>
        function confirm() {
            alert("ส่ง Order เสร็จสิ้น")
        }
    </script>
    </div>
    </div>

</body>

</html>