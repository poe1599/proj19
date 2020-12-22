<?php
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

// 檢查帳號密碼暱稱信箱是否有未填寫
if (empty($_POST['account']) || empty($_POST['password']) || empty($_POST['nickname']) || empty($_POST['email'])) {
    $output['code'] = 400;
    $output['error'] = '尚有未填寫的欄位';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
if (empty($_POST['avatar'])) {
    $_POST['avatar'] = null;
}

// 帳號驗證, 抓SQL內的資料出來比對是否曾註冊
$m_sql = "SELECT * FROM `member`";
$m_stmt = $pdo->query($m_sql);
$m_rows = $m_stmt->fetchAll();
foreach ($m_rows as $r) {
    if ($r['account'] == $_POST['account']) {
        $output['code'] = 400;
        $output['error'] = '帳號已註冊';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }
}

// 信箱驗證, 是否符合格式
$email_re = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
if (!preg_match($email_re, $_POST['email'])) {
    $output['code'] = 400;
    $output['error'] = 'Email 格式錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// 信箱驗證, 抓SQL內的資料出來比對是否曾註冊
$m_sql = "SELECT * FROM `member`";
$m_stmt = $pdo->query($m_sql);
$m_rows = $m_stmt->fetchAll();
foreach ($m_rows as $r) {
    if ($r['email'] == $_POST['email']) {
        $output['code'] = 400;
        $output['error'] = '信箱已註冊';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }
}

// 準備上傳圖片
// 確認圖片格式, 如果有上傳圖片, 重新命名
$filename = NULL;
if (!empty($_FILES) and !empty($_FILES['avatar']['type']) and $ext_map[$_FILES['avatar']['type']]) {
    // 亂數命名
    $filename = uniqid() . $ext_map[$_FILES['avatar']['type']];
    $output['filename'] = $filename;
    // 實際執行上傳檔案, 如果有上傳, 就繼續, 如果沒有有上傳, 就回報$output['error'] = '沒有上傳圖片';
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $upload_folder . '/' . $filename)) {
        $output['error'] = '沒有上傳圖片';
    }
}

// 準備註冊
$sql = "INSERT INTO `member`(`member_sid`, `account`, `password`, `email`, `nickname`, `avatar`, `address`) VALUES (NULL, ?, SHA(?), ?, ?, ?, ?)";

// 先做$pdo->prepare($sql), 然後execute()把原先$sql中有?的地方替換並在資料庫上執行SQL語法
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['account'],
    $_POST['password'],
    $_POST['email'],
    $_POST['nickname'],
    $filename,
    $_POST['address']
]);

// 回傳成功訊息
$output['success'] = true;
$output['code'] = 201;
unset($output['error']);
unset($output['post']);
echo json_encode($output, JSON_UNESCAPED_UNICODE);
exit;
