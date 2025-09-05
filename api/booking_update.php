<?php
include_once "db.php";

$id = $_POST['id'];
$status = $_POST['status'];

$Reserve->update($id, ['status' => $status]);
