<?php
// 導入驗證登入的php檔
require './is_member.php';

// 導入寫有資料庫連線的php檔
require './db_connect.php';

// 設定預設的輸出訊息
$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足'
];



if (isset($_POST['product_sid']) && isset($_POST['quantity'])) {
    $p_sql = "SELECT * FROM `product` WHERE `product_sid`= " . $_POST['product_sid'];
    $p_stmt = $pdo->query($p_sql);
    $p_row = $p_stmt->fetch();

    $output['p_sql'] = $p_sql;
    $output['product_sid'] = $p_row['product_sid'];
    $output['product_name'] = $p_row['product_name'];
    $output['quantity'] = $_POST['quantity'];
    $output['unit_price'] = $p_row['unit_price'];
    $output['price'] = $_POST['quantity'] * $p_row['unit_price'];



    $o_sql = "INSERT INTO `order_list`(`order_sid`, `member_sid`, `product_sid`, `product_name`, `quantity`, `unit_price`, `price`, `order_date`, `visible`, `next_time`, `check_state`, `check_date`) VALUES (NULL , ?, ?, ?, ?, ?, ?, NOW(), 1, 0, 0, NULL)";

    $o_stmt = $pdo->prepare($o_sql);
    $o_stmt->execute([
        $member_sid,
        $p_row['product_sid'],
        $p_row['product_name'],
        $_POST['quantity'],
        $p_row['unit_price'],
        $_POST['quantity'] * $p_row['unit_price']
    ]);

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}























// 取消本次全部訂單
if (isset($_GET['del_all'])) {
    $pdo->query("UPDATE `order_list` SET `visible` = 0 WHERE `member_sid` = $member_sid and `next_time` = 0");
}

// 取消下次全部訂單
if (isset($_GET['del_all_next_time'])) {
    $pdo->query("UPDATE `order_list` SET `visible` = 0 , `next_time` = 0 WHERE `member_sid` = $member_sid and `next_time` = 1");
}

// 取消單筆訂單
if (isset($_GET['order_sid']) && isset($_GET['cancel'])) {
    $order_sid = intval($_GET['order_sid']);
    $pdo->query("UPDATE `order_list` SET `visible` = 0 WHERE `order_sid` = $order_sid");
}

// 修改單筆訂單數量
if (isset($_GET['order_sid']) && isset($_GET['quantity'])) {
    $order_sid = intval($_GET['order_sid']);
    $quantity = intval($_GET['quantity']);
    $pdo->query("UPDATE `order_list` SET `quantity` = $quantity, `price`=`unit_price`*$quantity, `order_date`=NOW() WHERE `order_sid` = $order_sid");
}

// 全部下次再買
if (isset($_GET['all_to_next_time'])) {
    $pdo->query("UPDATE `order_list` SET `next_time` = 1 WHERE `member_sid` = $member_sid and `next_time` = 0");
}

// 單筆下次再買
if (isset($_GET['order_sid']) && isset($_GET['to_next_time'])) {
    $order_sid = intval($_GET['order_sid']);
    $pdo->query("UPDATE `order_list` SET `next_time` = 1 WHERE `order_sid` = $order_sid");
}

// 全部這次要買
if (isset($_GET['all_to_this_time'])) {
    $pdo->query("UPDATE `order_list` SET `next_time` = 0 WHERE `member_sid` = $member_sid and `next_time` = 1");
}

// 單筆這次要買
if (isset($_GET['order_sid']) && isset($_GET['to_this_time'])) {
    $order_sid = intval($_GET['order_sid']);
    $pdo->query("UPDATE `order_list` SET `next_time` = 0 WHERE `order_sid` = $order_sid");
}

// 轉回購物車
$backTo = 'cart.php';
if (isset($_SERVER['HTTP_REFERER'])) {
    $backTo = $_SERVER['HTTP_REFERER'];
}

// header('Location: ' . $backTo); 冒號後面記得要空一格
header('Location: ' . $backTo);
