<?php
// 引入資料庫連線設定
include_once 'db.php';

try {
    // 從 todo 資料表中取得所有資料，依照 id 由新到舊排序
    $stmt = $pdo->query("SELECT * FROM todo ORDER BY id DESC");
    $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 輸出為 JSON 格式，方便前端 AJAX 使用
    header('Content-Type: application/json');
    echo json_encode($todos);
} catch (PDOException $e) {
    // 錯誤處理：輸出錯誤訊息
    http_response_code(500);
    echo json_encode(['error' => '資料庫錯誤', 'message' => $e->getMessage()]);
}
