<?php
include_once 'db.php';

$title = trim($_POST['title'] ?? '');
if ($title !== '') {
    $stmt = $pdo->prepare("INSERT INTO todo (title) VALUES (?)");
    $stmt->execute([$title]);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
