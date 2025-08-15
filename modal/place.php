<?php
include_once '../api/db.php';

?>

<style>
    .btn-pink {
        background-color: #f48fb1;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 8px 16px;
        transition: background-color 0.3s;
    }

    .btn-pink:hover {
        background-color: #e57373;
    }
</style>

<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="table" value="place">
    <div class="mb-2">
        <label>選擇圖片：</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>名稱：</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-pink">上傳</button>
    </div>
</form>