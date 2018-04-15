<?php
session_start();
require_once ('../../validation/dbConnection.php');
if (isset($_POST['btnAdminLogin'])){
    //Retrieve the field values from our registration form.

    $userName = !empty($_POST['adminUserName']) ? trim($_POST['adminUserName']) : null;
    $adminPassword = !empty($_POST['adminPassword']) ? trim($_POST['adminPassword']) : null;

    //Construct the SQL statement and prepare it.
//Retrieve the user account information for the given username.
    $sql = "SELECT * FROM users WHERE userName = :userName";
    $stmt = $connection->prepare($sql);
    //Bind value.
    $stmt->bindValue(':userName', $userName);
    //Execute.
    $stmt->execute();
    //Fetch row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //If $row is FALSE.
    if($row === false){
        //Could not find a user with that username!
        header("Location: ../../pages/admin/admin_login.php?err=".urlencode("Oops! Username does Not Match any Record!"));
    } else{

        //User account found. Check to see if the given password matches the
        //password hash that we stored in our supervisors table.

        //Compare the passwords.
        $validPassword = password_verify($adminPassword, $row['userPassword']);

        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['users_id'] = $row['users_id'];
            $_SESSION['logged_in'] = time();
            header("Location: ../../pages/dashboard/dashboard.inc.php?Welcome=".urlencode("login_success"));
            exit();
        } else{
            //$validPassword was FALSE. Passwords do not match.
            header("Location: ../../pages/admin/admin_login.php?err=".urlencode("Incorrect Index Number or Password Combination!"));
            exit();
        }
    }

}
