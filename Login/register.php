<?php
include "connect.php";
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
    <meta name="" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>สมัครสมาชิก</title>
</head>

<body>
    <?php
    include("../navbar.php");
    ?>
    <form name="register" action="save_register.php" method="POST">
        <div class="container">
            <div class="card login-form">
                <div class="card-header text-center">
                    สมัครสาชิก
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Username</label>
                        <div class="col-md-9">
                            <input type="text" name="user_username" class="form-control" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="user_password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" name="user_name" class="form-control" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Gender</label>
                        <div class="col-md-9">
                            <fieldset>
                                <input type="radio" name="user_sex" id="sex-m" value="M">
                                <label for="sex-m">Male</label>
                                <input type="radio" name="user_sex" id="sex-f" value="F">
                                <label for="sex-f">Female</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Address</label>
                        <div class="col-md-9">
                            <input type="text" name="user_add" class="form-control" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Phone</label>
                        <div class="col-md-9">
                            <input type="text" name="user_phone" class="form-control" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Status</label>
                        <div class="col-md-9">
                            <fieldset>
                                <input type="radio" name="user_status" id="customer" value="1">
                                <label for="sex-m">Customer</label>
                                <input type="radio" name="user_status" id="employee" value="2">
                                <label for="sex-f">Employee</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-dark" type="submit">สมัครสมาชิก</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    
</body>