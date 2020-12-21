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
    .navbar .nav-item.active {
        background-color: #C4ED92;
        border-radius: 10px;
    }

    .order_num {
        width: 25px;
        display: inline-block;
        background: orange;
        color: papayawhip;
        text-align: center;
        border-radius: 50%;
    }
</style>
<div id="topIsHere"></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                        <a class="nav-link" href="./member_edit.php"><?= $_SESSION['member']['nickname'] ?></a>
                    </li>
                    <li class="nav-item px-2 <?= $pageName == 'logout' ? 'active' : '' ?>">
                        <a class="nav-link" href="./logout.php">登出</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item px-2 <?= $pageName == 'login' ? 'active' : '' ?>">
                        <a class="nav-link" href="./login.php">登入</a>
                    </li>
                    <li class="nav-item px-2 <?= $pageName == 'register' ? 'active' : '' ?>">
                        <a class="nav-link" href="./register.php">註冊</a>
                    </li>
                <?php endif ?>

            </ul>
        </div>
    </div>
</nav>