<?php
// 定義連結的資料庫
$db_host = 'localhost'; // 主機
$db_name = 'proj19'; // 資料庫的名稱
$db_user = 'allmight'; // 資料庫註冊的帳號
$db_pass = '666'; // 資料庫註冊的密碼

// dbname 注意不要打錯字
// dsn 是Data Source Name的縮寫
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";

// pdo 是PHP Data Object的縮寫
$pdo_option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_option);


// 指定address_book裡面的所有資料, fetchall拿出來, 2層foreach()呈現出來
// $r = $pdo->query("SELECT * FROM address_book")->fetchall(PDO::FETCH_ASSOC);
// foreach ($r as $r) {
//     foreach ($r as $r) {
//         echo "<p>$r</p>";
//     };
// };

// 判斷有沒有session, 沒有就送
if (!isset($_SESSION)) {
    session_start();
};
