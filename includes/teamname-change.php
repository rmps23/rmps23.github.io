<?php
  session_Start();

if (isset($_POST['confirm-teamname'])) {

  require "dbh.inc.php";

  $idTeam = $_GET['id'];
  $teamname = $_POST['new-teamname'];

  $sql1 = "SELECT * FROM teams WHERE idTeams='$idTeam'";
  $result1 = mysqli_query($conn,$sql1);
  $rowcount = mysqli_num_rows($result1);

  if (empty($teamname)) {
    header("Location: ../team-mang.php?id=$idTeam&error=empty");
    exit();
  }else if(!preg_match("/^[a-zA-Z0-9]*$/", $teamname)){
    header("Location: ../team-mang.php?id=$idTeam&error=invalidchar");
    exit();
  }else {
    $sql = "UPDATE teams SET teamName='$teamname' WHERE idTeams='$idTeam'";
    if ($conn->query($sql) === TRUE) {
      header("Location: ../team-mang.php?id=$idTeam&error=success");
      exit();
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();

  }
}
 ?>
