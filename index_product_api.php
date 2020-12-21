<?php
// 導入寫有資料庫連線的php檔
require './db_connect.php';

// $title = '商品'; // 標題
// $pageName = 'product_list'; // 讓navbar對應的選單變色

// 先確認有沒有$_GET['search'], 搜尋有value並送出的話$_GET['search']應該要取得input name="search"對應的value
$category_sid = isset($_GET['category_sid']) ? ($_GET['category_sid']) : '';
$params = []; // 搜尋的query string
$where = 'WHERE 1 AND `category_sid`'; // 搜尋`category_sid`裡面的內容
if (!empty($category_sid)) {
    $where .= sprintf(" = %s ", $category_sid);
    $params['category_sid'] = $category_sid;
}

// 定義資料列表有幾頁
// 用$_GET['page']讀取query string, 沒有的話指定為1
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 判斷現在在第幾頁

$perPage = 9; // 限制每頁資料有幾筆
$t_sql = "SELECT COUNT(1) FROM `product` $where"; // 取得資料總共有多少筆
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; // $pdo->query($t_sql)先指定那些資料, fetch(PDO::FETCH_NUM)[0]再拿下來
$totalPages = ceil($totalRows / $perPage); // 資料總共有幾頁

// 限制$page的範圍
if ($page > $totalPages) $page = $totalPages;
if ($page < 1) $page = 1;

// 輸出部分的資料的可變字串, 從第($page - 1) * $perPage筆開始, 每次$perPage筆
$p_sql = sprintf(
    "SELECT * FROM `product` %s LIMIT %s, %s",
    $where,
    ($page - 1) * $perPage,
    $perPage
);


// stmt是statement的縮寫
// 將$stmt指引到資料庫的特定表單
$stmt = $pdo->query($p_sql);
$card = $stmt->fetchall();

// 分類
$c_sql = "SELECT * FROM `category`";

// stmt是statement的縮寫
// 將$stmt指引到資料庫的特定表單
$c_stmt = $pdo->query($c_sql);
$category = $c_stmt->fetchall();
