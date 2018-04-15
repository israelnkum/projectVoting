<?php
require_once '../dbConnection.php';

$output = array('success' => false, 'messages' => array());

$users_id = $_POST['user_id'];// getting Current id

// deleting from the new_voting table
$sql = "DELETE FROM users WHERE users_id = :users_id";
$stmt =$connection->prepare($sql);
$stmt->bindValue(':users_id', $users_id);
$result = $stmt->execute();
if($result === TRUE){
    $output['success'] = true;

}else{
    $output['success'] = false;

}

$connection=null;
echo json_encode($output);
