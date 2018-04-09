<?php
require_once '../dbConnection.php';

$output = array('success' => false, 'messages' => array());

$norminee_ID = $_POST['norm_id'];// getting Current id

// deleting from the new_voting table
$sql = "DELETE FROM nominees WHERE nominee_id = :norm_id";
$stmt =$connection->prepare($sql);
$stmt->bindValue(':norm_id', $norminee_ID);
$result = $stmt->execute();
if($result === TRUE){
    $output['success'] = true;

}else{
    $output['success'] = false;

}

$connection=null;
echo json_encode($output);
