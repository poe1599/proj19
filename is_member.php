<?php
if (!isset($_SESSION)) {
    session_start();
}

// 在需要驗證的頁面加掛這支檔案, 如果沒有登入, 就跳轉到登入
if (!isset($_SESSION['member'])) {
    header('Location:login.php');
    exit;
}

$member_sid = $_SESSION['member']['member_sid'];
