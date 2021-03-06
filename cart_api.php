<?php
// 導入驗證登入的php檔
require './is_member.php';
// 導入寫有資料庫連線的php檔
require './db_connect.php';

$title = '購物車';
// 讓navbar對應的選單變色
$pageName = 'cart';

// 本次購物清單
$member = $_SESSION['member']['member_sid'];
$sql = "SELECT * FROM `order_list` WHERE `member_sid` = $member AND `visible` = 1 AND `next_time` = 0 AND `check_state` = 0";
$stmt = $pdo->query($sql);
$row = $stmt->fetchall();

// 本次購物車總花費計算
$total_cost = 0;
foreach ($row as $r) {
    $total_cost += $r['price'];
}

// 下次購物清單
$n_sql = "SELECT * FROM `order_list` WHERE `member_sid` = $member AND `visible` = 1 AND `next_time` = 1 AND `check_state` = 0";
$n_stmt = $pdo->query($n_sql);
$n_row = $n_stmt->fetchall();

// 下次購物車總花費計算
$n_total_cost = 0;
foreach ($n_row as $r) {
    $n_total_cost += $r['price'];
}

// // 歷史購物清單
// $h_sql = "SELECT * FROM `order_list` WHERE `member_sid` = $member AND `visible` = 0 AND `next_time` = 0 AND `check_state` = 1 ORDER BY `check_date` DESC";
// $h_stmt = $pdo->query($h_sql);
// $h_row = $h_stmt->fetchall();

// // 歷史購物總花費計算
// $h_total_cost = 0;
// foreach ($h_row as $r) {
//     $h_total_cost += $r['price'];
// }

// 設一個空陣列, 準備裝要修改資料
$fields = [];

// 日期填入防呆
if (isset($_GET['date_after']) && isset($_GET['date_before'])) {
    // 日期有以後 沒以前
    if (isset($_GET['date_after']) && $_GET['date_before'] == '') {
        $fields[] = " AND `check_date`>=" . $pdo->quote($_GET['date_after']);
    }
    // 日期沒以後 有以前
    if ($_GET['date_after'] == '' && isset($_GET['date_before'])) {
        $fields[] = " AND `check_date`<" . $pdo->quote($_GET['date_before']);
    }
    // 日期有以後 有以前
    if (($_GET['date_after']) != '' && $_GET['date_before'] != '') {
        if (strtotime($_GET['date_after']) < strtotime($_GET['date_before'])) {
            $fields[] = " AND `check_date`>=" . $pdo->quote($_GET['date_after']);
            $fields[] = " AND `check_date`<" . $pdo->quote($_GET['date_before']);
        } else {
            $fields[] = " AND `check_date`>=" . $pdo->quote($_GET['date_before']);
            $fields[] = " AND `check_date`<" . $pdo->quote($_GET['date_after']);
        }
    }
}

// 歷史購物清單
$h_sql = sprintf("SELECT * FROM `order_list` WHERE `member_sid` = $member AND `visible` = 0 AND `next_time` = 0 AND `check_state` = 1 %s ORDER BY `check_date` DESC", implode('', $fields));
$h_stmt = $pdo->query($h_sql);
$h_row = $h_stmt->fetchall();

// 歷史購物總花費計算
$h_total_cost = 0;
foreach ($h_row as $r) {
    $h_total_cost += $r['price'];
}


// 同時間結帳的購物清單
// $search_check_date = urldecode($_GET['check_date']);
$search_check_date = isset($_GET['check_date']) ? $_GET['check_date'] : NULL;
$t_sql = "SELECT * FROM `order_list` WHERE `member_sid` = $member AND `visible` = 0 AND `next_time` = 0 AND `check_state` = 1 AND `check_date` = '$search_check_date'";
$t_stmt = $pdo->query($t_sql);
$t_row = $t_stmt->fetchall();

// 同時間結帳的購物總花費計算
$t_total_cost = 0;
foreach ($t_row as $r) {
    $t_total_cost += $r['price'];
}

// 拿地址跟付款方式
$t_stmt = $pdo->query($t_sql);
$detail_row = $t_stmt->fetch();

// // 設定預設的輸出訊息
// $output = [
//     'success' => false,
//     'code' => 0,
//     'error' => '參數不足',
//     'check_date' => $search_check_date
// ];

// // 輸出訊息
// echo json_encode($output, JSON_UNESCAPED_UNICODE);
