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

    // 算購物車數量
    $member = $_SESSION['member']['member_sid'];
    $num_sql = "SELECT * FROM `order_list` WHERE `member_sid` = $member AND `visible` = 1 AND `next_time` = 0";
    $num_stmt = $pdo->query($num_sql);
    $num_row = $num_stmt->fetchall();
    $output['order_num'] = 0;
    foreach ($num_row as $r) {
        $output['order_num']++;
    }

    // 成功後要清除錯誤警告
    $output['success'] = true;
    unset($output['error']);
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
exit;
