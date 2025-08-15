<?php
include_once "db.php";

$id = $_POST['id'] ?? null;
$completed = $_POST['completed'] ?? 0;

if ($id !== null) {
    $sql = "UPDATE todo SET completed = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$completed, $id]);
}
