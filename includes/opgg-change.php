<?php
  session_Start();

if (isset($_POST['confirm-opgg'])) {
  require "dbh.inc.php";

  $idUser = $_SESSION['userId'];
  $opgg = $_POST['new-opgg'];


  if (empty($opgg)) {
    header("Location: ../profile.php?error3=empty");
    exit();
  }else {
    $opggtext = "https://euw.op.gg/summoner/userName=";
    $sql = "UPDATE users SET opggUsers='$opggtext$opgg' WHERE idUsers='$idUser'";
    if ($conn->query($sql) === TRUE) {
      header("Location: ../profile.php?error3=success");
      exit();
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();

  }



  }

 ?>
