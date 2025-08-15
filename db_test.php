<?php
// 測試資料庫連線
$host = 'localhost';
$dbname = 'hanami';
$username = 'root';
$password = ''; // XAMPP 預設是空的，MAMP 預設是 'root'

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    echo "✅ 資料庫連線成功！";
} catch (PDOException $e) {
    echo "❌ 資料庫連線失敗：" . $e->getMessage();
}
?>
