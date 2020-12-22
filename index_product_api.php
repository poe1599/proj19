<?php
// 導入寫有資料庫連線的php檔
require './db_connect.php';

$sql = "SELECT * FROM `product` ORDER BY RAND() LIMIT 6";
$stmt = $pdo->query($sql);
$card = $stmt->fetchall();
