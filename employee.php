<?php
session_start();
include "Login/connect.php";
$user_name = $_SESSION['user_name'];
$user_sex = $_SESSION['user_sex'];
$user_status = $_SESSION['user_status'];
$status_name = $_SESSION['status_name'];

if (empty($user_name)) {
    Header("Location: index.php");
} else if ($user_status != '2') {
    Header("Location: Login/logout.php");
}
?>


<?php
include "navbar.php";
?>

<div class="flex-center position-ref full-height">
    <div>
        <form action="Login/logout.php">
        <?php
            if ($user_sex == 'M') { ?>
                <img src='photo/profile/M.png' width='50'>
            <?php } else {?>
                <img src='photo/profile/F.png' width='50'>
            <?php } ?>
            สวัสดี คุณ <?php echo $user_name; ?> <br>สถานะ <?php echo $status_name; ?><br>
            <input class="btn btn-danger dropdown-toggle" type="submit" value="ออกจากระบบ">
        </form>
    </div>
</div>