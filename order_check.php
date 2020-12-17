<?php
// 導入驗證登入的php檔
require './is_member.php';

// 導入寫有資料庫連線的php檔
require './db_connect.php';

// 訂單結帳(假)
if (isset($_GET['check_all'])) {
    if (intval($_GET['check_all']) == 1) {
        $pdo->query("UPDATE `order_list` SET `visible` = 0 ,`check_state`= 1 ,`check_date`=NOW() WHERE `member_sid` = $member_sid");
    }
}

// 轉回購物車
$backTo = 'cart.php';
if (isset($_SERVER['HTTP_REFERER'])) {
    $backTo = $_SERVER['HTTP_REFERER'];
}

// header('Location: ' . $backTo); 冒號後面記得要空一格
header('Location: ' . $backTo);
