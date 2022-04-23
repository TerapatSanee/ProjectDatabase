<?php
include "Login/connect.php";
session_start();
$user_id = $_SESSION["user_id"];
$user_username = $_SESSION["user_username"];
$user_password = $_SESSION["user_password"];
$user_name = $_SESSION["user_name"];
$user_sex = $_SESSION["user_sex"];
$user_add = $_SESSION["user_add"];
$user_phone = $_SESSION["user_phone"];
$user_status = $_SESSION["user_status"];
$status_name = $_SESSION["status_name"];

$gender = "";
if ($user_sex == "M") {
    $gender = "ชาย";
} else {
    $gender = "หญิง";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="profile" content="width=device-width, initial-scale=1.0">

    <title>Profile</title>
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
                ข้อมูลผู้ใช้
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">รหัสID</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">เพศ</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">สถานะไอดี</th>
                            <?php if ($user_status == "2") { ?>
                                <th scope="col">ยอดที่ขายได้</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td><?php echo $user_id; ?></td>
                            <td><?php echo $user_name; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $user_add ?></td>
                            <td><?php echo $status_name; ?></td>
                            <?php if ($user_status == "2") {
                                $stmt = $pdo->prepare("SELECT total_price FROM incomeexpense WHERE employee_sale = '$user_name'");
                                $stmt->execute();

                                $total = 0;
                                while ($row = $stmt->fetch()) {
                                    $total = $total + $row['total_price'];
                                } ?>
                                <td><?php echo $total; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td colspan="4">
                            <td><input type=button onClick='window.history.back()' class="btn btn-primary btn-sm" value='BACK'></td>

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>