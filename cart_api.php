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
$sql = "SELECT * FROM `order_list` WHERE `member_sid` = $member AND `visible` = 1 AND `next_time` = 0";
$stmt = $pdo->query($sql);
$row = $stmt->fetchall();

// 本次購物車總花費計算
$total_cost = 0;
foreach ($row as $r) {
    $total_cost += $r['price'];
}

// 下次購物清單
$n_sql = "SELECT * FROM `order_list` WHERE `member_sid` = $member AND `visible` = 1 AND `next_time` = 1";
$n_stmt = $pdo->query($n_sql);
$n_row = $n_stmt->fetchall();

// 下次購物車總花費計算
$n_total_cost = 0;
foreach ($n_row as $r) {
    $n_total_cost += $r['price'];
}

// 歷史購物清單
$h_sql = "SELECT * FROM `order_list` WHERE `member_sid` = $member AND `check_state` = 1";
$h_stmt = $pdo->query($h_sql);
$h_row = $h_stmt->fetchall();

// 歷史購物總花費計算
$h_total_cost = 0;
foreach ($h_row as $r) {
    $h_total_cost += $r['price'];
}
