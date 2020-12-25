<?php
// 導入驗證登入的php檔
require './is_member.php';

// 導入寫有資料庫連線的php檔
require './db_connect.php';


// 取消本次全部訂單
if (isset($_GET['del_all'])) {
    $pdo->query("UPDATE `order_list` SET `visible` = 0 , `next_time` = 0 WHERE `member_sid` = $member_sid and `next_time` = 0 and `check_state`= 0");
}

// 取消下次全部訂單
if (isset($_GET['del_all_next_time'])) {
    $pdo->query("UPDATE `order_list` SET `visible` = 0 , `next_time` = 0 WHERE `member_sid` = $member_sid and `next_time` = 1 and `check_state`= 0");
}

// 取消單筆訂單
if (isset($_GET['order_sid']) && isset($_GET['cancel'])) {
    $order_sid = intval($_GET['order_sid']);
    $pdo->query("UPDATE `order_list` SET `visible` = 0 , `next_time` = 0 WHERE `member_sid` = $member_sid and `order_sid` = $order_sid and `check_state`= 0");
}

// 修改單筆訂單數量
if (isset($_GET['order_sid']) && isset($_GET['quantity'])) {
    $order_sid = intval($_GET['order_sid']);
    $quantity = intval($_GET['quantity']);
    $pdo->query("UPDATE `order_list` SET `quantity` = $quantity, `price`=`unit_price`*$quantity, `order_date`=NOW() WHERE `member_sid` = $member_sid and `order_sid` = $order_sid and `check_state`= 0");
}

// 全部下次再買
if (isset($_GET['all_to_next_time'])) {
    $pdo->query("UPDATE `order_list` SET `next_time` = 1 WHERE `member_sid` = $member_sid and `next_time` = 0 and `check_state`= 0");
}

// 單筆下次再買
if (isset($_GET['order_sid']) && isset($_GET['to_next_time'])) {
    $order_sid = intval($_GET['order_sid']);
    $pdo->query("UPDATE `order_list` SET `next_time` = 1 WHERE `member_sid` = $member_sid and `order_sid` = $order_sid and `check_state`= 0");
}

// 全部這次要買
if (isset($_GET['all_to_this_time'])) {
    $pdo->query("UPDATE `order_list` SET `next_time` = 0 WHERE `member_sid` = $member_sid and `next_time` = 1 and `check_state`= 0");
}

// 單筆這次要買
if (isset($_GET['order_sid']) && isset($_GET['to_this_time'])) {
    $order_sid = intval($_GET['order_sid']);
    $pdo->query("UPDATE `order_list` SET `next_time` = 0 WHERE `member_sid` = $member_sid and `order_sid` = $order_sid and `check_state`= 0");
}

// 轉回購物車
$backTo = 'cart.php';
if (isset($_SERVER['HTTP_REFERER'])) {
    $backTo = $_SERVER['HTTP_REFERER'];
}

// header('Location: ' . $backTo); 冒號後面記得要空一格
header('Location: ' . $backTo);
