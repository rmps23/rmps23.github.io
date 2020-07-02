<?php
  session_Start();

if (isset($_POST['confirm-leaveteam'])) {
  require "dbh.inc.php";

  $idUser = $_SESSION['userId'];

  $sql1 = "SELECT * FROM users WHERE emailUsers='$email'";
  $result1 = mysqli_query($conn,$sql1);
  $rowcount = mysqli_num_rows($result1);


  $sql = "UPDATE users SET idTeam='0' WHERE idUsers='$idUser'";
  if ($conn->query($sql) === TRUE) {
      header("Location: ../profile.php?i=success");
      exit();
  } else {
    echo "Error updating record: " . $conn->error;
  }

    $conn->close();

  }





 ?>
