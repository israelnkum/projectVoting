<?php
include '../dbConnection.php';

if (isset($_POST['btn_upload'])){
    //$file = $_FILES['file'];

    $fileName = $_FILES['selected_file']['name'];
    $fileTmpName = $_FILES['selected_file']['tmp_name'];
    $fileSize = $_FILES['selected_file']['size'];
    $fileError = $_FILES['selected_file']['error'];
    $fileType= $_FILES['selected_file']['name'];

    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

    $files_allowed = array('csv');

    if (!in_array($fileExt,$files_allowed)){

        header("Location: ../../pages/voters/uploadVoter.inc.php?fileTypeError=".urlencode("Please Select a .csv File"));
    }

}
