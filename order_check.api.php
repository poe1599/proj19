<?php
// 導入驗證登入的php檔
require './is_member.php';

// 導入寫有資料庫連線的php檔
require './db_connect.php';

// 設定預設的輸出訊息(除錯用)
$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足',
    'post' => $_POST,
    'payment_method' => '',
    'shipping_address' => '',
];

// 付款方式
$payment_method_map = [
    '1' => 'PChomePay支付連 現金 (ATM、餘額、銀行支付)',
    '2' => '7-11取貨付款',
    '3' => '銀行或郵局轉帳',
    '4' => '郵局無摺存款',
    '5' => '貨到付款',
];

$payment_method = $payment_method_map[$_POST['payment_method_sid']];
$output['payment_method'] = $payment_method;

$shipping_address = $_POST['shipping_address'];
$output['shipping_address'] = $shipping_address;

// 訂單結帳(假), 結算本次, 並把下次移到本次
if (isset($_POST['payment_method_sid']) || isset($_POST['shipping_address'])) {
    // 將本次消費的結清
    $pdo->query("UPDATE `order_list` SET `visible` = 0 ,`check_state`= 1 ,`check_date`=NOW() , `shipping_address` = '$shipping_address' , `payment_method` = '$payment_method' WHERE `member_sid` = $member_sid AND `visible` = 1 AND `next_time`= 0 AND `check_state`= 0");

    // // 將下次消費的移到本次
    // $pdo->query("UPDATE `order_list` SET `next_time`= 0 WHERE `member_sid` = $member_sid AND `next_time`= 1");
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
exit;

// // 轉回購物車
// $backTo = 'cart.php';
// if (isset($_SERVER['HTTP_REFERER'])) {
//     $backTo = $_SERVER['HTTP_REFERER'];
// }

// // header('Location: ' . $backTo); 冒號後面記得要空一格
// header('Location: ' . $backTo);
