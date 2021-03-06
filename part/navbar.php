<?php
// 算購物車數量
$order_num = 0;
if (isset($_SESSION['member']['member_sid'])) {
    require './db_connect.php';
    $member_sid = $_SESSION['member']['member_sid'];
    $num_sql = "SELECT * FROM `order_list` WHERE `member_sid` = $member_sid AND `visible` = 1 AND `next_time` = 0";
    $num_stmt = $pdo->query($num_sql);
    $num_row = $num_stmt->fetchall();
    foreach ($num_row as $r) {
        $order_num++;
    }
}
?>

<style>
    .navbar-expand-lg {
        background-color: #FBE79A;
    }

    .navbar .nav-item.active {
        background-color: #FAD689;
        border-radius: 50px;
        /* box-shadow: inset 0px 0px 5px 1px #000; */
        box-shadow: inset -0.1em -0.1em 0.2em #838A2D;
    }

    .order_num {
        width: 24px;
        height: 24px;
        display: inline-block;
        background: orange;
        color: papayawhip;
        text-align: center;
        border-radius: 50%;
        line-height: 24px;
        text-shadow: 0.1em 0.1em 0.2em black;
    }

    .side_order_num {
        width: 50px;
        height: 50px;
        line-height: 50px;
        border-radius: 50%;
        background-color: orange;
        line-height: 50px;
        text-align: center;
        position: fixed;
        bottom: 80px;
        right: 25px;
        color: #fef;
        z-index: 99;
        text-shadow: 0.1em 0.1em 0.2em black;
    }
</style>
<div id="topIsHere"></div>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="./index_.php">希望峰食堂</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item px-2 <?= $pageName == 'product_list' ? 'active' : '' ?>">
                    <a class="nav-link" href="./product_list.php">今日菜單</a>
                </li>
                <!-- <li class="nav-item <?= $pageName == 'AAAAAA' ? 'active' : '' ?>">
                    <a class="nav-link" href="#">Link</a>
                </li> -->
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['member'])) : ?>
                    <li class="nav-item px-2 <?= $pageName == 'cart' ? 'active' : '' ?>">
                        <a class="nav-link" href="./cart.php"><i class="fas fa-shopping-cart"></i>
                            <div class="order_num <?= $order_num ? 'd-inline-block' : 'd-none' ?>" id="order_num"><?= $order_num ?></div>
                        </a>
                    </li>
                    <li class="nav-item px-2 <?= $pageName == 'member_edit' ? 'active' : '' ?>">
                        <a class="nav-link" href="./member_edit.php"><i class="fas fa-user mr-2"></i><?= $_SESSION['member']['nickname'] ?></a>
                    </li>
                    <li class="nav-item px-2 <?= $pageName == 'logout' ? 'active' : '' ?>">
                        <a class="nav-link" href="./logout.php">登出</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item px-2 <?= $pageName == 'login' ? 'active' : '' ?>">
                        <a class="nav-link" href="./login.php"><i class="fas fa-user mr-2"></i>登入</a>
                    </li>
                    <li class="nav-item px-2 <?= $pageName == 'register' ? 'active' : '' ?>">
                        <a class="nav-link" href="./register.php"><i class="fas fa-user-plus mr-2"></i>註冊</a>
                    </li>
                <?php endif ?>

            </ul>
        </div>
    </div>
</nav>


<!-- <a href="#">
    <div class="goTop"><i class="fas fa-chevron-up"></i></div>
</a> -->
<a class="" href="./cart.php">
    <div class="side_order_num <?= $order_num ? 'd-inline-block' : 'd-none' ?>" id="side_order_num"><i class="fas fa-shopping-cart mr-2"></i><?= $order_num ?></div>
</a>