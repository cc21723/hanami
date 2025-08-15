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
    <input type="hidden" name="table" value="users">
    <div class="mb-2">
        <label>帳號：</label>
        <input type="text" name="acc" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>密碼：</label>
        <input type="password" name="pw" class="form-control" required>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-pink">新增</button>
    </div>
</form>