<?php
require "header.php";
require "includes/dbh.inc.php";
 ?>

<main>

  <div class="index-img">
    Teste
    <br><br><br><br>
  </div>

  <?php

    if (isset($_SESSION['userId'])) {
      $sql = "SELECT * FROM `users` WHERE idUsers = ".$_SESSION['userId']."";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if($resultCheck > 0){
        if ($row = mysqli_fetch_assoc($result)) {
          $rowName = $row['uidUsers'];
        }

      }

      echo "Welcome ".$rowName."";
    }
    else {
      echo '<p>You are logged off!</p>';
    }

   ?>


</main>

<?php
require "footer.php"
 ?>
