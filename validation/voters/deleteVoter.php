<?php
require_once '../dbConnection.php';

$output = array('success' => false, 'messages' => array());

$voters_ID = $_POST['vote_id'];// getting Current id

// deleting from the new_voting table
$sql = "DELETE FROM voters WHERE voter_id = :vote_id";
$stmt =$connection->prepare($sql);
$stmt->bindValue(':vote_id', $voters_ID);
$result = $stmt->execute();
if($result === TRUE){
    $output['success'] = true;

}else{
    $output['success'] = false;

}

$connection=null;
echo json_encode($output);
