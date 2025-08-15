<?php
include_once "db.php";

$table = $_POST['table'] ?? '';
$ids = $_POST['id'] ?? [];

echo ($table);
// ✅ 限定允許的資料表
$allowTables = ['product', 'place', 'reserve', 'users'];
if (!in_array($table, $allowTables)) {
    exit("非法資料表！");
}

// ✅ 處理刪除資料
if (isset($_POST['del'])) {
    foreach ($_POST['del'] as $delId) {
        $sql = "DELETE FROM `$table` WHERE id=?";
        $pdo->prepare($sql)->execute([$delId]);
    }
}

// ✅ 若為 reserve 表，先將所有 sh 設為 0（確保只有一筆可顯示）
if ($table == 'reserve') {
    $pdo->exec("UPDATE `reserve` SET `sh` = 0");
}

// ✅ 處理每一筆資料
foreach ($ids as $idx => $id) {
    // 若此筆已刪除，跳過
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        continue;
    }

    // ✅ 根據 table 決定欄位名稱
    switch ($table) {
        case 'product':
        case 'place':
        case 'reserve':
            $textCol = 'title';
            break;
        case 'users':
            $textCol = 'acc';
            break;
        default:
            exit('未知的資料表結構');
    }


    $text = $_POST['text'][$idx] ?? '';

    // ✅ 處理 sh 欄位邏輯
    if ($table == 'reserve') {
        // 單選邏輯：只有一筆的 id 會等於 $_POST['sh']
        $sh = ($_POST['sh'] == $id) ? 1 : 0;
    } else {
        // 多選邏輯
        $sh = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
    }

    if ($table == 'users') {
        $acc = $_POST['acc'][$idx] ?? '';
        $pw = $_POST['pw'][$idx] ?? '';

        if ($pw === '') {
            $sql = "UPDATE `$table` SET `acc`=? WHERE `id`=?";
            $pdo->prepare($sql)->execute([$acc, $id]);
        } else {
            // $pw = password_hash($pw, PASSWORD_DEFAULT);
            $sql = "UPDATE `$table` SET `acc`=?, `pw`=? WHERE `id`=?";
            $pdo->prepare($sql)->execute([$acc, $pw, $id]);
        }
    } else {
        // ✅ 執行更新
        $sql = "UPDATE `$table` SET `$textCol`=?, `sh`=? WHERE `id`=?";
        $pdo->prepare($sql)->execute([$text, $sh, $id]);
    }
}

// ✅ 回到對應頁面
header("Location: ../dashboard.php?do={$table}");
