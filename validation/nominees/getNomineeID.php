<?php
require_once '../dbConnection.php';
$nominee_id = $_POST['nom_id'];
$sql = "SELECT * FROM nominees WHERE nominee_id = :norm_id";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':norm_id',$nominee_id);

$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$connection=null;
echo json_encode($row);