<?php
include_once "db.php";

$table = $_POST['table'] ?? '';

if ($table === 'users') {
    $acc = $_POST['acc'] ?? '';
    $pw = $_POST['pw'] ?? '';

    if (!empty($acc) && !empty($pw)) {
        $sql = "INSERT INTO `users` (`acc`, `pw`) VALUES (?, ?)";
        $pdo->prepare($sql)->execute([$acc, $pw]);
        header("Location: ../dashboard.php?do=users");
    } else {
        echo "帳號或密碼不可為空";
    }
} else {
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $title = $_POST['title'] ?? ''; 
        $alt = $_POST['alt'] ?? ''; 

        if ($image && move_uploaded_file($tmp_name, "../images/" . $image)) {
            $sql = "INSERT INTO `$table` (`img`, `title`, `alt`, `uploaded_at`) VALUES (?, ?, ?, NOW())";
            // $sql = "INSERT INTO `product` (`img`, `uploaded_at`) VALUES (?, ?, NOW())";
            $pdo->prepare($sql)->execute([$image, $title, $alt]);
            header("Location: ../dashboard.php?do={$table}");
        } else {
            echo "上傳失敗";
        }
    } else {
        echo "沒收到檔案";
    }
}
