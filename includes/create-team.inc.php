<?php
session_Start();

if (isset($_POST['createteam-submit'])) {

  require 'dbh.inc.php';

  $idUser = $_SESSION['userId'];
  $teamName = $_POST['teamName'];
  $teamLogo = 0;
  $lfp = 0;

  if (empty($teamName)) {
    header("Location: ../create-team.php?error=empty");
    exit();
  }else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $teamName)){
    header("Location: ../signup.php?error=invalidchar");
    exit();
  }else {
        $sql = "INSERT INTO teams (idUsers, teamName, teamLogo, teamLFP) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../create-team.php?error=sqlerror");
          exit();
        }else {
          mysqli_stmt_bind_param($stmt, "ssss", $idUser, $teamName, $teamLogo, $lfp);
          mysqli_stmt_execute($stmt);

          $teamID = mysqli_insert_id($conn);

          header("Location: ../team-mang.php?id='$teamID'");
          exit();
        }
      }



  mysqli_stmt_close($stmt);
  mysqli_close($conn);


}else {
  header("Location: ../index.php");
  exit();
}
