<?php
require "header.php";
require "includes/dbh.inc.php";

if (isset($_SESSION['userId'])) {

   $sessionId = $_SESSION['userId'];

   $sql = "SELECT * FROM teams WHERE idUsers not in ('$sessionId') AND teamLFP = 1";
   $result = mysqli_query($conn, $sql);
   $resultCheck = mysqli_num_rows($result);
   if ($resultCheck > 0) {

     ?>
     <div class="st-main">
     <table class="st-table">
       <tr>
       <td style="width:30%;">
    <div class="st-filter">
      <p>teste</p>
    </div>
      </td>
      <td>
    <?php
   while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
     ?>

     <div class="st-line">
       <?php

       if ($row[3] == 0) {
         ?>
         <img height="60" width="60" src="uploads-img/0.png" alt="">
         <?php
       }else {
         ?>
         <img height="60" width="60" src="uploads-img/<?php echo $row[3]; ?>" alt="">
         <?php
       }
       $idUser = $row[1];

       $sql1 = "SELECT * FROM users WHERE idUsers = '$idUser'";
       $result1 = mysqli_query($conn, $sql1);
       $resultCheck1 = mysqli_num_rows($result1);

       if ($resultCheck1 > 0) {
         if ($row2 = mysqli_fetch_assoc($result1)) {
           $rowName = $row2['uidUsers'];
           echo $rowName;
           ?>
           &nbsp;
           <?php
         }
         echo $row[2];
       }


           ?>
           &nbsp;
           <?php
           echo "Team Rank:";
           ?>

           <form class="" action="" method="post">
             <button type="button" name="button">Apply</button>
           </form>

          </div>

           <?php
         }

     ?>
     </div>
     </td>
     <tr>
     </table>


     <br>
     <?php


   }else {
     echo "There is no teams looking for players!";
   }
}
