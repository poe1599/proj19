<?php
// 導入驗證登入的php檔
require __DIR__ . '/is_member.php';

// 導入寫有資料庫連線的php檔
require __DIR__ . '/db_connect.php';

// 將想儲存檔案的資料夾位置設為字串
$upload_folder = __DIR__ . '/uploads/member';

// 設定預設的輸出訊息(除錯用)
$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足',
    'post' => $_POST,
];

// 辨別上傳檔案所使用的陣列
$ext_map = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
];

// 設一個空陣列, 準備裝要修改資料
$fields = [];

// $pdo->quote($_POST['nickname'])跳脫表單送來的值, 接到`nickname`="的後面, 再送到$fields[]這個陣列中
$fields[] = "`nickname`=" . $pdo->quote($_POST['nickname']);

$fields[] = "`address`=" . $pdo->quote($_POST['address']);

// 如果密碼錯誤
if ($_POST['password'] != $_SESSION['member']['password']) {
    $output['error'] = '密碼錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}


// 有沒有要改密碼
if (!empty($_POST['new_password'])) {
    // $pdo->quote($_POST['new_password'])跳脫表單送來的值, 用sprintf()取代%s, 再送到$fields[]這個陣列中
    $fields[] = sprintf("`password`=SHA1(%s)", $pdo->quote($_POST['new_password']));
}

// 有沒有上傳圖
if (!empty($_FILES) and !empty($_FILES['avatar']['type']) and $ext_map[$_FILES['avatar']['type']]) {
    $output['file'] = $_FILES;

    // 新亂數名稱與副檔名
    $filename = uniqid() . $ext_map[$_FILES['avatar']['type']];
    $output['filename'] = $filename;
    // 實際執行上傳檔案, 如果有上傳, 將"`avatar`= '$filename' "這個字串送到$fields[]這個陣列中
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_folder . '/' . $filename)) {
        $fields[] = "`avatar`= '$filename' ";
    }
}
// implode()把陣列$fields內的值用','接起來, 靠sprintf()取代字串中的%s, 形成新字串
$sql = sprintf("UPDATE `member` SET %s WHERE `member_sid`=? AND `password`=SHA(?) ", implode(',', $fields));

$output['sql'] = $sql;

// 先做$pdo->prepare($sql), 然後execute()把原先$sql中有?的地方替換並在資料庫上執行SQL語法
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_SESSION['member']['member_sid'],
    $_POST['password'],
]);

// 如果$stmt資料只有1筆
if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    unset($output['error']);
    // 更新 session

    // 將更新的資料庫紀錄拿出來, 更新$_SESSION['member']內的紀錄
    $_SESSION['member'] = $pdo->query("SELECT * FROM `member` WHERE `member_sid`=" . intval($_SESSION['member']['member_sid']))->fetch();

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
exit;
