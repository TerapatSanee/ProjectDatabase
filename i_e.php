<?php
include "Login/connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0">

    <title>ประวัติรายรับ-รายจ่าย</title>
    <?php
    include "navbar.php";

    ?>
</head>

<body>
    <div class="container">

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
                ประวัติรายรับ-รายจ่าย
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <?php
                        $stmt = $pdo->prepare("SELECT incomeexpense.user_name,date,status_name,total_price,IE_name,incomeexpense.IE_status,employee_sale FROM incomeexpense,status,ie_status WHERE incomeexpense.IE_status = ie_status.IE_status 
                        AND incomeexpense.user_status = status.user_status");
                        $stmt->execute();
                        $i = 0;
                        while ($row = $stmt->fetch()) {
                            if ($i == 0) { ?>
                                <tr>
                                    <th scope="col">ชื่อผู้ใช้</th>
                                    <th scope="col">สถานะผู้ใช้</th>
                                    <th scope="col">วัน/เดือน/ปี</th>
                                    <th scope="col">ราคารวม</th>
                                    <th scope="col">ชื่อผู้ขายสินค้า</th>
                                    <th scope="col">สถานะ</th>
                                    <?php $i = $i+1; ?>
                                <?php } ?>
                                </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $row['user_name']; ?></td>
                            <td><?= $row['status_name']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><?= $row['total_price']; ?></td>
                            <td><?= $row['employee_sale']; ?></td>
                            <td class="amount-stock"><?= $row['IE_name']; ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4">
                        <td><a href="order.php"><input type=button class="btn btn-primary btn-sm" value='BACK'></a></td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>