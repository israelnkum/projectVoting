<?php
require_once '../dbConnection.php';
$output = array('success' => false, 'messages' => array());
$positionID = $_POST['pstion'];
$sql = "DELETE FROM positions WHERE position_id = :pos_id";
$stmt =$connection->prepare($sql);
$stmt->bindValue(':pos_id', $positionID);
$result = $stmt->execute();
if($result === TRUE){
    $output['success'] = true;

}else{
    $output['success'] = false;

}

$connection=null;
echo json_encode($output);
