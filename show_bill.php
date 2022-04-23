<?php
include "Login/connect.php";
session_start();
$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="profile" content="width=device-width, initial-scale=1.0">

    <title>Bill</title>
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
                Bill
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>


                        <tr>
                            <th scope="col">รหัสบิล</th>
                            <th scope="col">วัน/เดือน/ปี</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT bill_id,bill_date,bill_name,bill.bill_status FROM bill,bill_status WHERE bill.bill_status = bill_status.bill_status AND user_id = '$user_id' ");
                        $stmt->execute();

                        while ($row = $stmt->fetch()) { ?>
                            <form action="delete_bill.php" method="POST">
                                <tr>
                                    <td><?= $row["bill_id"] ?></td>
                                    <td><?= $row["bill_date"] ?></td>
                                    <td><?= $row["bill_name"] ?></td>
                                    <input type="hidden" name="bill_id" value="<?= $row["bill_id"] ?>" >
                                    <?php if($row["bill_status"] != 0){ ?>
                                        <td><input type="submit" class="btn btn-danger btn-sm" value='OK'></td>
                                    <?php }else{ ?>
                                        <td><input type="submit" disabled class="btn btn-info btn-sm" value='OK'></td>
                                    <?php } ?>
                                </tr>
                            </form>
                        <?php } ?>
                    </tbody>
            </div>
        </div>
        </table>
        <div class="text-center">
            <a href="product.php" ><input type=button class="btn btn-primary btn-sm" value='BACK'></a>
        </div>
    </div>

</body>

</html>