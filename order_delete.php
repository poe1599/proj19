<?php
// 導入驗證登入的php檔
require './is_member.php';

// 導入寫有資料庫連線的php檔
require './db_connect.php';

// 取消全部訂單
if (intval($_GET['del_all']) == 1) {
    $pdo->query("UPDATE `order_list` SET `visible` = 0 WHERE `member_sid` = $member_sid");
}

// 取消單筆訂單
if (isset($_GET['order_sid'])) {
    $order_sid = intval($_GET['order_sid']);
    $pdo->query("UPDATE `order_list` SET `visible` = 0 WHERE `order_sid` = $order_sid");
}








$backTo = 'cart.php';
if (isset($_SERVER['HTTP_REFERER'])) {
    $backTo = $_SERVER['HTTP_REFERER'];
}

// header('Location: ' . $backTo); 冒號後面記得要空一格
header('Location: ' . $backTo);
