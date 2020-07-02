<?php
  session_Start();

if (isset($_POST['confirm-rank'])) {

  require "dbh.inc.php";

  $idUser = $_SESSION['userId'];
  $idRank = $_POST['rank'];
  $idTeam = $_GET['id'];

  $sql1 = "SELECT * FROM teams WHERE idTeams='$idTeam'";
  $result1 = mysqli_query($conn,$sql1);
  $rowcount = mysqli_num_rows($result1);

  $sql = "UPDATE teams SET teamRank='$idRank' WHERE idTeams='$idTeam'";

  if ($conn->query($sql) === TRUE) {
    header("Location: ../team-mang.php?id=$idTeam");
    exit();
  } else {
  echo "Error updating record: " . $conn->error;
  }


    $conn->close();


}
 ?>
