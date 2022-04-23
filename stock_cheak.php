<?php
include "Login/connect.php";
include "navbar.php";
session_start();
$employee_sale = $_SESSION["user_name"];

$stmt0 = $pdo->prepare("SELECT order_detail_id,order_id FROM orders_detail WHERE order_id = ?");
$stmt0->bindParam(1, $_POST["order_id"]);
$stmt0->execute();

while ($row0 = $stmt0->fetch()) {
    $stock_orderid = $row0['order_id'];
    //echo 'order_detail_id' . $row0['order_detail_id'] . "<br>";

    $stmt = $pdo->prepare("INSERT INTO stock_work(order_id) VALUES('$stock_orderid')");
    $stmt->execute();
}

$stmt1 = $pdo->prepare("SELECT stock_work_id,stock_work.order_id,food_amount,food_name,food_type,orders_detail.foodid,stockAmount,stocksize,food_recipes.stockid,
recipes_size FROM stock_work,orders_detail,stock,food_recipes WHERE orders_detail.foodid = stock.foodid AND orders_detail.order_id = stock_work.order_id AND 
food_recipes.stockID = stock.stockID AND stock_work.order_id = ? ");
$stmt1->bindParam(1, $_POST["order_id"]);
$stmt1->execute();

while ($row1 = $stmt1->fetch()) {

    if (!empty($row1)) {
        $food_amount = $row1["food_amount"];
        $food_name = $row1["food_name"];
        $stock_amount = $row1["stockAmount"];
        $stock_size = $row1["stocksize"];
        $food_type = $row1["food_type"];
        $food_id = $row1["foodid"];
        $stockid = $row1["stockid"];
        $order_id = $row1["order_id"];
        $recipes_size = $row1["recipes_size"];

        /*echo "food_amount = " . $food_amount . "<br>";
        echo "stock_amount = " . $stock_amount . "<br>";
        echo "food_id = " . $food_id . "<br>";
        echo "stock_size = " . $stock_size . "<br>";
        echo "food_type = " . $food_type . "<br>";
        echo "stock_id = " . $stockid . "<br>";*/

        $new_size = 0;
        $error = 0;

        if ($food_type == "กาแฟ") {
            if ($food_id == 1) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $$stock_size = $stock_size + 1000;
                        //echo "stocksize1 = " . $stocksize . "<br>";
                        break;
                    } else {
                        $error = 1;
                        //echo $error . "<br>";
                        break;
                    }
                }
                if ($stock_size >  $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                    //echo "new_size1 = " . $new_size . "<br>";
                }
            } else if ($food_id == 2) {
                while ($stock_size <  $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 250;
                        //echo "stocksize2 = " . $stocksize . "<br>";
                        break;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size >  $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                    //echo "new_size2 = " . $new_size . "<br>";
                }
            } else if ($food_id == 3) {
                while ($stock_size <  $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 250;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size >  $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 4) {
                while ($stock_size <  $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 250;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size >  $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            }
        } else if ($food_type == "นม") {
            if ($food_id == 5) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 250;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size >  $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 6) {
                while ($stock_size <  $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 500;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 7) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 100;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size >  $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 8) {
                while ($stock_size <  $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 250;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > 20) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 9) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 250;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size >  $recipes_size) {
                    $new_size = $stock_size - ($recipes_size * $food_amount);
                }
            } else if ($food_id == 10) {
                while ($stock_size <  $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 2000;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size >  $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            }
        } else if ($food_type == "ชา") {
            if ($food_id == 11) {
                while ($stock_size <  $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 250;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size >  $recipes_size) {
                    $new_size = $stock_size - ($recipes_size * $food_amount);
                }
            } else if ($food_id == 12) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 250;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 13) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 400;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > 30) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 14) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 100;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            }
        } else if ($food_type == "น้ำโซดา") {
            if ($food_id == 15) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 710;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 16) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 710;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 17) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 250;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 18) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 770;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 19) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 755;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 20) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 755;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            }
        } else if ($food_type == "น้ำผลไม้") {
            if ($food_id == 21) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 755;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 22) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 755;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 23) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 755;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 24) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 755;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 25) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 755;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 26) {
                if ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 710;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 27) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 755;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            } else if ($food_id == 28) {
                while ($stock_size < $recipes_size) {
                    if ($stock_amount >= 1) {
                        $stock_amount = $stock_amount - 1;
                        $stock_size = $stock_size + 755;
                    } else {
                        $error = 1;
                        break;
                    }
                }
                if ($stock_size > $recipes_size) {
                    $new_size = $stock_size - ($recipes_size  * $food_amount);
                }
            }
        }

        if ($error == 0) {
            $stmt3 = $pdo->prepare("UPDATE bill SET bill_status = 1 WHERE order_id = '$stock_orderid' ");
            $stmt3->execute();

            $stmt2 = $pdo->prepare("UPDATE stock SET stocksize = '$new_size' , stockAmount = '$stock_amount' WHERE foodid = '$food_id' ");
            $stmt2->execute();

?>
            <div class="container">
                <div class="card-body col-md-14">
                    <div class="card login-form">
                        <form action="order.php" method="POST">
                            <div class="card-header text-center">
                                รับออเดอร์ที่ <?php echo $order_id ?> เรียบร้อยแล้ว
                            </div><br>
                            <div class="text-center">
                                <input type="submit" value="Go to Order page" class="btn btn-danger btn-sm">
                            </div>
                            <input type="hidden" name="test_show" value="รับออเดอร์สำเร็จแล้ว" class="btn btn-primary btn-sm">
                        </form>
                    </div>
                </div>
            </div>
        <?php } else {
            $stmt3 = $pdo->prepare("UPDATE bill SET bill_status = 2 WHERE order_id = '$stock_orderid' ");
            $stmt3->execute(); ?>

            <div class="container">
                <div class="card-body col-md-14">
                    <div class="card login-form">
                        <form action="order.php" method="POST">
                            <div class="card-header text-center">
                                ออเดอร์ที่ <?php echo $order_id ?> ไม่พร้อมเสริฟ เนื่องจากวัตถุดิบไม่เพียงพอ
                            </div><br>
                            <div class="text-center">
                                <input type="submit" value="Go to Order page" class="btn btn-danger btn-sm">
                            </div>
                            <input type="hidden" name="test_show" value=" <?php echo $str_error; ?>" class="btn btn-primary btn-sm">
                        </form>
                    </div>
                </div>
            </div>
<?php }
    }
}
if ($error == 0) {
    $stmt4 = $pdo->prepare("SELECT * FROM ie_customer_works WHERE order_id = ?"); /////////////////////////////////////////////
    $stmt4->bindParam(1, $_POST["order_id"]);
    $stmt4->execute();

    while ($row4 = $stmt4->fetch()) {
        $date = $row4['date'];
        $user_name = $row4['user_name'];
        $user_status = $row4['user_status'];
        $total_price = $row4['total_price'];
        $IE_status = $row4['IE_status'];

        $stmt5 = $pdo->prepare("INSERT INTO incomeexpense (date,user_name,user_status,total_price,employee_sale,IE_status) 
                    VALUES ('$date','$user_name','$user_status','$total_price','$employee_sale','$IE_status')"); ////////////////////
        $stmt5->execute();
    }

    $stmt6 = $pdo->prepare("DELETE FROM ie_customer_works WHERE order_id = ?"); /////////////////////
    $stmt6->bindParam(1, $_POST["order_id"]);
    $stmt6->execute();
}

$pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("DELETE FROM stock_work ");
$stmt->execute();

$pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("DELETE FROM orders WHERE order_id = ? ");
$stmt->bindParam(1, $_POST["order_id"]);
$stmt->execute();

$pdo = new PDO("mysql:host=localhost;dbname=projectdatabase;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("DELETE FROM orders_detail WHERE order_id = ? ");
$stmt->bindParam(1, $_POST["order_id"]);
$stmt->execute();

?>