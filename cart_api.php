<?php
// 導入驗證登入的php檔
require './is_member.php';
// 導入寫有資料庫連線的php檔
require './db_connect.php';

$title = '購物車';
// 讓navbar對應的選單變色
$pageName = 'cart';

$member = $_SESSION['member']['member_sid'];
$sql = "SELECT * FROM `order_list` WHERE `member_sid` = $member AND `visible` = 1";
$stmt = $pdo->query($sql);
$row = $stmt->fetchall();
