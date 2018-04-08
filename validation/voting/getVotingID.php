<?php
require_once '../dbConnection.php';
$votingid = $_POST['vote_id'];
$sql = "SELECT * FROM new_voting WHERE newVoting_id = :vote";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':vote',$votingid);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$connection=null;
echo json_encode($row);