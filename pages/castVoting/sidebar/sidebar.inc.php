<div class="col-md-2">
    <div class="card">
        <div class="card-title">
            Select Voting
        </div>

        <!--<img src='../../assets/nomineeUploads/".$row['votingName'].$row['postion'].$row['indexNumber'].".jpg' style='height: 150px; width: 150px;'>
                                                 -->
        <div class="card-body">
            <?php
            include "../../validation/dbConnection.php";
            $sql = "SELECT * FROM new_voting";
            $stmt = $connection->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

             echo '
                <form method="post" action="../../validation/castVoting/checkVotingType.php" class="needs-validation form-material" novalidate>
                    <button class="btn btn-info btn-block" type="submit" id="btn_CheckVoting" name="btn_CheckVoting" value="'.$row['voting_name'].'">
                        '.$row['voting_name'].'
                    </button>
                    <hr>
                </form>';
            }
            ?>

        </div>
    </div>
</div><!-- end column 4 -->