<?php
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked
if ($_POST) {

    $validator = array('success' => false, 'messages' => array());

//Retrieve the field values from our registration form.

    $editUserId = !empty($_POST['editUserId']) ? trim($_POST['editUserId']) : null;
    $editFirstName = !empty($_POST['editFirstName']) ? trim($_POST['editFirstName']) : null;
    $editlastName = !empty($_POST['editlastName']) ? trim($_POST['editlastName']) : null;
    $editUserName = !empty($_POST['editUserName']) ? trim($_POST['editUserName']) : null;
    $editUserMail = !empty($_POST['editUserMail']) ? trim($_POST['editUserMail']) : null;
    $editVoterIndexNumber = !empty($_POST['editVoterIndexNumber']) ? trim($_POST['editVoterIndexNumber']) : null;

    $sql = "UPDATE users SET 
    firstName=:firstName,lastName=:lastName,userName=:userName,email=:email
    WHERE users_id=:users_id";

    $stmt = $connection->prepare($sql);

    $stmt->bindValue(':firstName',$editFirstName);
    $stmt->bindValue(':lastName',$editlastName);
    $stmt->bindValue(':userName',$editUserName);
    $stmt->bindValue(':email',$editUserMail);
    $stmt->bindValue(':users_id',$editUserId);

    $result=$stmt->execute();
    if($result){
        $validator['success'] = true;

    }else{
        $validator['success'] = false;
    }
    $connection=null;
    echo json_encode($validator);

}