<?php
require_once('../dbConnection.php');
$output= array('data' =>array());
$sql = "SELECT * FROM users";
$stmt = $connection->prepare($sql);
$stmt->execute();
$x =1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    $action ='

<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUserModal" onclick="editUserInfo('.$row['users_id'].')">
    <i class="fa fa-edit"></i>
</button>


<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUserModal" onclick="deleteUser('.$row['users_id'].')">
    <i class="fa fa-trash-o"></i>
</button>
     ';

    $output['data'][] = array(
        $x,
        $row['userName'],
        $row['email'],
        $action

    );
    $x++;
    $connection=null;

}

echo json_encode($output);
