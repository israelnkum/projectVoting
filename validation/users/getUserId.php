<?php
require_once '../dbConnection.php';
$users_id = $_POST['user_id'];
$sql = "SELECT * FROM users WHERE users_id = :users_id";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':users_id',$users_id);

$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$connection=null;
echo json_encode($row);