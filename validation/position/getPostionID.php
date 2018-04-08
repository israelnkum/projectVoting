<?php
require_once '../dbConnection.php';
$ps_id = $_POST['pos_id'];
$sql = "SELECT * FROM positions WHERE position_id = :p_id";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':p_id',$ps_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$connection=null;
echo json_encode($row);