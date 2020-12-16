<?php
session_start();

// 通常建議用這種方式來清除session
unset($_SESSION['member']);

// session_destroy($_SESSION); 暴力清除, 使用注意, 如果購物車等頁面有用到session也會被清掉
// session_destroy($_SESSION);

// 重新導向登入畫面
header('Location:login.php');
