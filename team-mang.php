<?php

require "header.php";
require "includes/dbh.inc.php";

if (isset($_SESSION['userId'])) {
  if (isset($_GET['id'])) {
    $idTeam = $_GET['id'];

  $sql = "SELECT * FROM teams WHERE idUsers = ".$_SESSION['userId']." AND idTeams = ".$idTeam."";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if($resultCheck > 0){
    if ($row = mysqli_fetch_assoc($result)) {
      $rowId = $row['idTeams'];
      $rowName = $row['teamName'];
      $rowLogo = $row['teamLogo'];
      $rowLFP = $row['teamLFP'];
      // $rowRank = $row['teamRank'];

      ?>
      <div class="tm-main">

                <p class="tm-sub">Team Id&nbsp;</p>
                <div class="tm-line">
                  <?php echo '<div class="tm-text">'.$rowId.'</div>'?>
                </div>


                <p class="profile-sub">Team Name&nbsp;</p>
                <div class="profile-line">
                  <?php echo '<p class="profile-text">'.$rowName.'</p>'?>

                  <form class="edit-form" action="includes/teamname-change.php?id=<?php echo $rowId; ?>" method="post">
                    <input class="tm-textbox" type="text" name="new-teamname" value="" placeholder="New Username">
                    <button class="tm-button" type="submit" name="confirm-teamname">Confirm</button>
                  </form>

                </div>


                <p class="profile-sub">Team Logo&nbsp;</p>
                <div class="profile-line">
                  <?php echo '<p class="profile-text">'.$rowLogo.'</p>'?>
                  <form class="edit-form" action="includes/upload-img.php?idTeam=<?php echo $rowId; ?>" enctype="multipart/form-data" method="post">
                    <input  class="tm-button" type="file" name="file" value=""/>
                    <button class="tm-button" type="submit" name="submit">Upload Image</button>
                  </form>
                </div>



                <p class="profile-sub">Looking for Player&nbsp;</p>
                <div class="profile-line">
                  <p class="profile-text">* Teams are LFP when it has less then 5 players.</p>
                  <?php
                    if ($rowLFP == 1) {
                       echo '<a class="profile-text">Yes </a>';
                    }else{
                       echo '<a class="profile-text">No</a>';
                    }


                   ?>
                </div>

                <p class="profile-sub">Team Rank&nbsp;</p>
                <div class="profile-line">
                    <?php
                    $sql2 = "SELECT * FROM ranks";
                    $result2 = mysqli_query($conn, $sql2);
                    $resultCheck2 = mysqli_num_rows($result2);


                    /* if ($rowRank === "0") {
                      echo "<p class='tm-text'>Team rank undefined.</p>";
                    }else {

                      $sql3 = "SELECT * FROM ranks WHERE idRank = '$rowRank'";
                      $result3 = mysqli_query($conn, $sql3);
                      $resultCheck3 = mysqli_num_rows($result3);

                      if($resultCheck3 > 0){

                          if ($row3 = mysqli_fetch_assoc($result3)) {
                            $rowRankName = $row3['nameRank'];
                            echo '<p class="tm-text">'.$rowRankName."</p>";
                          }

                        }
                    }
                    */ 
                    ?>


                    <?php
                    $sql2 = "SELECT * FROM ranks";
                    $result2 = mysqli_query($conn, $sql2);
                    $resultCheck2 = mysqli_num_rows($result2);
                    ?>

                    <form action="includes/rank-change.php?id=<?php echo $rowId; ?>" method="post">
                    <?php
                    if($resultCheck2 > 0){
                      ?>
                      <select class="tm-textbox" name="rank">
                        <?php
                      while ($row = mysqli_fetch_array($result2, MYSQLI_NUM)) {
                        echo  "<option value=".$row['0'].">".$row['1']."</option>";
                        }
                        ?>
                        </select>
                        <?php
                      }
                      }
                     ?>
                     <button class="edit-info-button" type="submit" name="confirm-rank">Confirm</button>
                    </div>
                    </form>

      </div>




      <?php

  }
}else {
  echo "Invalid Link Access.";
}

}




 ?>
