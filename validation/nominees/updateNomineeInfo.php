<?php
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked
if ($_POST) {

    $validator = array('success' => false, 'messages' => array());

//Retrieve the field values from our registration form.
    $normineeID = $_POST['c_normId'];
    $editID = !empty($_POST['editID']) ? trim($_POST['editID']) : null;
    $editFristName = !empty($_POST['editFristName']) ? trim($_POST['editFristName']) : null;
    $editLastName = !empty($_POST['editLastName']) ? trim($_POST['editLastName']) : null;
    $editOtherName = !empty($_POST['editOtherName']) ? trim($_POST['editOtherName']) : null;
    $editNomineePosition = !empty($_POST['editNomineePosition']) ? trim($_POST['editNomineePosition']) : null;
    $editNomineeClass = !empty($_POST['editNomineeClass']) ? trim($_POST['editNomineeClass']) : null;
    $editIndexNumber = !empty($_POST['editIndexNumber']) ? trim($_POST['editIndexNumber']) : null;

    $sql = "UPDATE nominees SET 
    firstName=:firstName,lastName=:lastName,
    otherName=:otherName,postion=:postion,
    class=:class,indexNumber=:indexNumber 
    WHERE nominee_id =:nominee_id ";

    $stmt = $connection->prepare($sql);

    $stmt->bindValue(':firstName',$editFristName);
    $stmt->bindValue(':lastName',$editLastName);
    $stmt->bindValue(':otherName',$editOtherName);
    $stmt->bindValue(':postion',$editNomineePosition);
    $stmt->bindValue(':class',$editNomineeClass);
    $stmt->bindValue(':indexNumber',$editIndexNumber);
    $stmt->bindValue(':nominee_id',$editID);

    $result=$stmt->execute();
    if($result){
        $validator['success'] = true;

    }else{
        $validator['success'] = false;
    }
    $connection=null;
    echo json_encode($validator);

}