<?php
include_once "db.php";

// 圖片處理
$imgPaths = [];
if (!empty($_FILES['style-image']['name'][0])) {
    foreach ($_FILES['style-image']['tmp_name'] as $key => $tmp_name) {
        $filename = uniqid() . "_" . $_FILES['style-image']['name'][$key];
        move_uploaded_file($tmp_name, "../images/" . $filename);
        $imgPaths[] = $filename;
    }
}

// 資料儲存
$saveResult = $Booking->save([
    'name' => $_POST['name'],
    'phone' => $_POST['phone'],
    'line' => $_POST['line'],
    'contact' => $_POST['contact'],
    'date' => $_POST['date'],
    'time' => $_POST['time'],
    'style_img' => json_encode($imgPaths),
    'extend' => intval($_POST['extend']),  // 轉成整數
    'remove' => intval($_POST['remove']),  // 轉成整數
    'referrer' => $_POST['referrer'],
    'notes' => $_POST['notes'],
    'status' => '待確認',
    'created_at' => date('Y-m-d H:i:s')
]);

echo $saveResult ? 'success' : 'error';
