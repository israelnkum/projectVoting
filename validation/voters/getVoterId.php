<?php
require_once '../dbConnection.php';
$voter_id = $_POST['c_vote_id'];
$sql = "SELECT * FROM voters WHERE voter_id = :voter_id";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':voter_id',$voter_id);

$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$connection=null;
echo json_encode($row);