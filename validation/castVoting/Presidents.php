<?php
include_once '../../validation/dbConnection.php';
include '../../includes/header.inc.php';
include '../../includes/voterNavs.inc.php';
?>

<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Voting</a></li>
                            <li class="breadcrumb-item active">Cast Voting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Voting</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 offset-md-0 text-center card-title">
                        <h1 class="display-4">President</h1>
                    </div>
                </div>

                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['btn_CheckVoting'])){

                                    $value = $_POST['btn_CheckVoting'];
                                    $sql = "SELECT * FROM new_voting  WHERE voting_name = :votingName";
                                    $stmt = $connection->prepare($sql);
                                    $stmt->bindValue(":votingName", $value);
                                    $stmt->execute();
                                    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        $starting_time = $row['starting_time'];
                                        $ending_time = $row['ending_time'];
                                        $voting_date =$row['voting_date'];
                                        $today_date = date("Y-m-d");
                                        // covert to strttotime
                                        $strt = strtotime($voting_date);
                                        $today=strtotime($today_date);
                                        echo $today1 =strtotime($starting_time);
                                        // compare the dates
//                                        if ($today > $strt){
//                                            echo "Voting Ended";
//                                            //day difference
//                                            $diff = $today - $strt;
//                                            $x =abs(floor($diff /(60*60*24)));
//                                            echo "Ended". $x."Ago";
//                                        }elseif($today < $strt){
//                                            $diff = $today - $strt;
//                                            $x =abs(floor($diff /(60*60*24)));
//                                            if ($x == 1){
//                                                echo "Voting Start's Tomorrow";
//                                            }else{
//                                                echo "Voting Start's in ".$x." Days";
//                                            }
//
//                                        }else{
//                                    $sql = "SELECT * FROM nominees WHERE votingName  = :votingName";
//                                    $stmt = $connection->prepare($sql);
//                                    $stmt->bindValue(":votingName", $value);
//                                    $stmt->execute();
//                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//                                    ?>
<!--                                    <div class='container'>-->
<!--                                        --><?php
//                                        if ($row["postion"] == "President" AND $row["votingName"] == $value){
//                                        $files = scandir('../../assets/nomineeUploads/');
//                                        ?>
<!--                                        <div class='row'>-->
<!--                                            --><?php
//                                            for ($i = 2; $i < 3; $i++){
//                                            ?>
<!--                                            <div class="col-md-4 offset-md-4">-->
<!--                                                <div class="card">-->
<!--                                                    <div class="col-md-12 text-center">-->
<!--                                                        --><?php
//                                                        echo "<img class='img-circle'  src='../../assets/nomineeUploads/".$row['imageName'].".jpg? ".mt_rand(). "' style=' margin: 25px; width:120px; height: 120px; '/>
//                                                                      <form class=\"\" action='' method='post'>
//                                                                       <div class=\"text-right\">
//                                                                           <button type='submit' name='btn_castVote' class=\"btn  btn-success\">Vote <i class='fa fa-check-circle'></i></button>
//                                                                       </div>
//                                                                   </form>
//                                                                      ";
//
//                                                        ?>
<!--                                                    </div>-->
<!---->
<!--                                                    <div class="card-title text-center">-->
<!--                                                        --><?php
//                                                        echo  $row['lastName']." ".$row['firstName']." ".$row['otherName'];
//                                                        ?>
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                --><?php
//                                                echo '
//                                                    </div>
//                                           </div>';
//                                                }
//                                                }
//                                                ?>
<!--                                            </div>-->
<!--                                            <div class="col-md-6">-->
<!--                                            </div>-->
<!--                                            --><?php
//                                            }
//                                        }
                                    }


                                    }
                                    ?>
                                </div>
                            </div>
                        </div><!-- column 8 -->
                    </div>  <!-- end row -->
                            <div class="text-right">
                                <small class="text-danger">You Cant Vote For This Position If You Skip it!</small>
                                <?php
                                echo '<form method="post" action="vicePresident.php">
                                    <button type="submit" name="btn_President_skiped" class="btn btn-danger" value="'.$value.'">Skip <i class="fa fa-angle-double-right"></i></button>
                                </form>';
                                ?>
                            </div>
                </div>
            </div><!-- end col-12 -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<?php
include '../../includes/footer.inc.php';
?>
