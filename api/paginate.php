<?php
function paginate($table, $limit = 5) {
    global $pdo;
    $page = $_GET['page'] ?? 1;
    $page = max(1, intval($page));
    $start = ($page - 1) * $limit;

    $total = $pdo->query("SELECT COUNT(*) FROM `$table`")->fetchColumn();
    $totalPages = ceil($total / $limit);
    $rows = $pdo->query("SELECT * FROM `$table` ORDER BY `uploaded_at` DESC LIMIT $start, $limit")->fetchAll();

    return [$rows, $totalPages];
}
