<?php
include "Login/connect.php";
include "navbar.php";

session_start();
$user_name = $_SESSION['user_name'];

$stmt = $pdo->prepare("UPDATE stock SET stockAmount = ? WHERE stockID = ?");
$stmt->bindParam(1, $_POST["stockAmount"]);
$stmt->bindParam(2, $_POST["stockID"]);
$stmt->execute(); ?>

<form action="income_expense.php" method="POST">
    <div class="container">
        <div class="card-body col-md-14">
            <div class="card login-form">
                <div class="card-header text-center">
                    เพิ่มสินค้าสำเร็จ!!<br>
                    <?php 
                    $stmt1 = $pdo->prepare("SELECT stockPrice FROM stock WHERE stockID = ?");
                    $stmt1->bindParam(1, $_POST["stockID"]);
                    $stmt1->execute();
                    $row1 = $stmt1->fetch();
                    $amount = $_POST["stockAmount"]; ?>

                    <?php
                        $total = $amount * $row1["stockPrice"];
                    ?>
                    จำนวน <?php echo $amount ?><br>
                    ราคารวมทั้งหมด <?php echo $total ?> บาท
                </div><br>
                <div class="text-center">
                    <input type="hidden" name="user_name" value="<?php echo $user_name ?>">
                    <input type="hidden" name="user_status" value="2">
                    <input type="hidden" name="total_price" value="<?php echo $total ?>">
                    <input type='submit' value="GO to Stock page" class="btn btn-danger btn-sm">
                </div><br>
            </div>
        </div>
    </div>
</form>