<?php
session_start();
// database Connection
require_once ('../dbConnection.php');
// if button is actually clicked
if ($_POST) {
    $validator = array('success' => false,'messages' => array());
//Retrieve the field values from our registration form.

    $firstName = !empty($_POST['firstName']) ? trim($_POST['firstName']) : null;
    $lastName = !empty($_POST['lastName']) ? trim($_POST['lastName']) : null;
    $userName  = !empty($_POST['userName']) ? trim($_POST['userName']) : null;
    $userMail = !empty($_POST['userMail']) ? trim($_POST['userMail']) : null;
    $userPassword = !empty($_POST['userPassword']) ? trim($_POST['userPassword']) : null;

//checking if the supplied username already exists.
    // SQL statement and prepare it.
    $sql = "SELECT COUNT(userName) AS num FROM users WHERE userName = :userName";
    $stmt = $connection->prepare($sql);
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':userName', $userName);
    //Execute.
    $stmt->execute();
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        $validator['success'] = false;
    }else {

        $sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";
        $stmt = $connection->prepare($sql);
        //Bind the provided username to our prepared statement.
        $stmt->bindValue(':email', $userMail);
        //Execute.
        $stmt->execute();
        //Fetch the row.
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['num'] > 0){
            $validator['success'] = false;
        }else {
            $hashPassword = password_hash($userPassword, PASSWORD_BCRYPT, array("cost" => 12));
            $sql = "INSERT INTO users
        ( firstName, lastName, userName, email, userPassword)
        VALUES
        (:firstName,:lastName,:userName,:email,:userPassword)";

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(':firstName', $firstName);
            $stmt->bindValue(':lastName', $lastName);
            $stmt->bindValue(':userName', $userName);
            $stmt->bindValue(':email', $userMail);
            $stmt->bindValue(':userPassword', $hashPassword);


            $result = $stmt->execute();
            if ($result === true) {
                $validator['success'] = true;

            } else {
                $validator['success'] = false;

            }

        }


        }// else --> username validation

        $connection = null;
        echo json_encode($validator);

}// post

