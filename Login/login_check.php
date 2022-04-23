<!doctype html>
<html lang="en">

<head>
  <?php
  include "../navbar.php";
  ?>
</head>

<body>

  <div class="login-form">
    <title>เข้าสู่ระบบ</title>
    <?php
    include "connect.php";
    session_start();
    $stmt = $pdo->prepare("SELECT * FROM users ,status WHERE user_username = ? AND user_password = ? AND users.user_status = status.user_status");
    $stmt->bindParam(1, $_POST["user_username"]);
    $stmt->bindParam(2, $_POST["user_password"]);
    $stmt->execute();
    $row = $stmt->fetch();

    // หาก username และ password ตรงกัน จะมีข้อมูลในตัวแปร $row
    if (!empty($row)) {
      $_SESSION["user_id"] = $row["user_id"];
      $_SESSION["user_username"] = $row["user_username"];
      $_SESSION["user_password"] = $row["user_password"];
      $_SESSION["user_name"] = $row["user_name"];
      $_SESSION["user_sex"] = $row["user_sex"];
      $_SESSION["user_add"] = $row["user_add"];
      $_SESSION["user_phone"] = $row["user_phone"];
      $_SESSION["user_status"] = $row["user_status"];
      $_SESSION["status_name"] = $row["status_name"];


      if ($_SESSION["user_status"] == "2") { ?>
        <div class="container">
          <div class="card-body col-md-14">
            <div class="card login-form">
              <div class="card-header text-center">
                เข้าสู่ระบบสำเร็จ!!
              </div><br>
              <div class="text-center">
                <a href='../order.php' class="btn btn-danger btn-sm">GO to Order page</a>
              </div><br>
            </div>
          </div>
        </div>
      <?php
      } else if ($_SESSION["user_status"] == "1") {
      ?>
        <div class="container">
          <div class="card-body col-md-14">
            <div class="card login-form">
              <div class="card-header text-center">
                เข้าสู่ระบบสำเร็จ!!
              </div><br>
              <div class="text-center">
                <a href='../product.php' class="btn btn-danger btn-sm">GO to Product page</a>
              </div><br>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php
    } else { ?>
      <div class="container">
        <div class="card-body col-md-14">
          <div class="card login-form">
            <div class="card-header text-center">
              ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง
            </div><br>
            <div class="text-center">
              หากต้องการเข้าสู่ระบบอีกครั้งโปรดคลิก<br><br>
              <a href='../index.php' class="btn btn-danger btn-sm">GO to Login page</a> </div> <br>
            </div>
          </div>
        </div>
      <?php
    }
      ?>
      </div>
</body>

</html>