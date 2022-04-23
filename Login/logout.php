<?php
include "connect.php";
include "../navbar.php";
?>
<?php
session_start();
$params = session_get_cookie_params();
setcookie(
    session_name(),
    '',
    time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]
);

session_destroy(); // ทำลาย session
?>
<!doctype html>
<html lang="en">

<head>
</head>

<body>
    <div class="container">
        <div class="card-body col-md-14">
            <div class="card login-form">
                <div class="card-header text-center">
                    ออกจากระบบสำเร็จแล้ว
                </div><br>
                <div class="text-center">
                    หากต้องการเข้าสู่ระบบอีกครั้งโปรดคลิก<br><br>
                    <a href='../index.php' class="btn btn-danger btn-sm">เข้าสู่ระบบ</a>
                </div><br>
            </div>
        </div>
    </div>
</body>

</html>