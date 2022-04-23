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
    ?>

    <title>เข้าสู่ระบบ</title>
</head>

<body>
    <form action="Login/login_check.php" method="POST">
        <div class="container">
            <div class="card login-form">
                <div class="card-header text-center">
                    เข้าสู่ระบบ
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Username</label>
                        <div class="col-md-9">
                            <input type="text" name="user_username" class="form-control" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="user_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-danger" type="submit">เข้าสู่ระบบ</button>
                            <a href="Login/register.php" class="login-form">สมัครสมาชิก</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>