<?php

if (isset($_POST[''])){
    $file = $_FILES['nomineeImage'];

    $fileName = $_FILES['nomineeImage']['name'];
    $fileTmpName = $_FILES['nomineeImage']['tmp_name'];
    $fileSize = $_FILES['nomineeImage']['size'];
    $fileError = $_FILES['nomineeImage']['error'];
    $fileType= $_FILES['nomineeImage']['name'];

    $fileExt = explode('.',$fileName);
    $fileAcutalExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg');

    if (in_array($fileAcutalExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 1000000){
                //$fileNameNew = "profile".$id.".".$fileAcutalExt;

                $fileNameNew = $nomineePosition.$indexNumber.".".$fileAcutalExt;
                $fileDestination = '../../assets/nomineeUploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);

            }else{
                ?>
                <script type="text/javascript">
                    swal({
                        title: "Error",
                        text: "File size Too big",
                        icon: "Warning",
                        button:true
                    });
                </script>
                <?php
            }
        }else{
            ?>
            <script type="text/javascript">
                swal({
                    title: "Error",
                    text: "Error While Uploading Image",
                    icon: "Warning",
                    button:true
                });
            </script>
            <?php
        }
    }else{
        ?>
        <script type="text/javascript">
            swal({
                title: "Error",
                text: "You Can't Upload Files of This Type",
                icon: "Warning",
                button:true
            });
        </script>
        <?php
    }
}









//require_once ('../../validation/dbConnection.php');
if (isset($_POST['btn_delete'])) {
    $file_name = "../assets/uploads/profile".$_SESSION['u_id']."*";
    $file_info = glob($file_name);
    $file_ext = explode(".",$file_info[0]);
    $file_acutal_ext = $file_ext[3];
    $file = "../assets/uploads/profile".$_SESSION['u_id'].".jpg";

    if (!unlink($file)) {
        echo "Error Deleting file";
    }else {
        $sql = "UPDATE users SET  	profileImage = :one WHERE users_id = :userID";
        $stmt = $connection->prepare($sql);

        $stmt->bindValue(':one','0');
        $stmt->bindValue(':userID',$_SESSION['u_id']);
        $result=$stmt->execute();
        header("Location: ../pages/userProfile.php?msg=".urlencode("Image Delted Successfully"));
        exit();
    }

}

if (isset($_POST['firstUploadBtn'])){

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType= $_FILES['file']['name'];

    $fileExt = explode('.',$fileName);
    $fileAcutalExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg');

    if (in_array($fileAcutalExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 1000000){
                $fileNameNew = "profile".$id.".".$fileAcutalExt;
                $fileDestination = '../assets/uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);

                $sql = "UPDATE users SET  	profileImage = :one WHERE users_id = :userID";
                $stmt = $connection->prepare($sql);

                $stmt->bindValue(':one','1');
                $stmt->bindValue(':userID',$_SESSION['u_id']);
                $result=$stmt->execute();
                header("Location: ../pages/firstLogin/firstLoginUpdate.php?img_success=".urlencode("Image Upload Success"));
                exit();
            }else{
                header("Location: ../pages/firstLogin/firstLoginUpdate.php?file_size=".urlencode("File size is more than 500kb"));
                exit();
            }
        }else{
            header("Location: ../pages/firstLogin/firstLoginUpdate.php?error_uploading=".urlencode("Sorry! There was an Error whiles uploading your image"));
            exit();
        }
    }else{
        header("Location: ../pages/firstLogin/firstLoginUpdate.php?file_type=".urlencode("Sorry! You cant Upload Files of This Type. Only jpg is allowed"));
        exit();
    }


    /*
     * Delete Profile Image When the REmove button is Cliked
    */
}elseif (isset($_POST['firstDeleteBtn'])) {
    $file_name = "../assets/uploads/profile".$_SESSION['u_id']."*";
    $file_info = glob($file_name);
    $file_ext = explode(".",$file_info[0]);
    $file_acutal_ext = $file_ext[3];

    $file = "../assets/uploads/profile".$_SESSION['u_id'].".jpg";

    if (!unlink($file)) {
        header("Location: ../pages/firstLogin/firstLoginUpdate.php?empty_file=".urlencode("Sorry! No Image to Delete"));
        exit();
    }else {
        $sql = "UPDATE users SET profileImage = :one WHERE users_id = :userID";
        $stmt = $connection->prepare($sql);

        $stmt->bindValue(':one','0');
        $stmt->bindValue(':userID',$_SESSION['u_id']);
        $result=$stmt->execute();
        header("Location: ../pages/firstLogin/firstLoginUpdate.php?image_delete=".urlencode("Image Deleted Successfully"));
        exit();
    }

}
