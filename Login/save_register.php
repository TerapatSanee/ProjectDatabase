<!doctype html>
<html lang="en">

<head>
    <?php
    include "../navbar.php";
    ?>
    <div class="container">
        <div class="card login-form">
            <title>สมัครสมาชิก</title>
</head>

<body>
    <?php
    include "connect.php";
    $pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO users (user_username,user_password,user_name,user_sex,user_add,user_phone,user_status) VALUES (?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $_POST["user_username"]);
    $stmt->bindParam(2, $_POST["user_password"]); 
    $stmt->bindParam(3, $_POST["user_name"]);
    $stmt->bindParam(4, $_POST["user_sex"]);
    $stmt->bindParam(5, $_POST["user_add"]);
    $stmt->bindParam(6, $_POST["user_phone"]);
    $stmt->bindParam(7, $_POST["user_status"]);
    $stmt->execute();

    if ($stmt) { ?>
        <div class="card login-form">
            <div class="card-header text-center">
                สมัครสมาชิกสำเร็จ!!<br>
                <a href='../index.php'>GO to Login page</a>
            </div>
        </div>
    <?php
    } else { ?>
        <div class="card login-form">
            <div class="card-header text-center">
                เกิดข้อผิดพลาดในการสมัครสมาชิก!!!<br>
                <a href='register.php'>GO to Register page</a>
            </div>
        </div>
    <?php
        echo "[" . $stmt . "]";
    } ?>
</body>

</html>