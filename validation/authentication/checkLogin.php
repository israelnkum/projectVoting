<?php
include "../../validation/dbConnection.php";
if (!isset($_SESSION['indexNumber'])){
    header("Location: http://localhost/projectVoting/");
}
