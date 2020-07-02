<?php
  session_Start();
  
if (isset($_POST['confirm-role'])) {
  require "dbh.inc.php";

  $idUser = $_SESSION['userId'];
  $idRole = $_POST['role'];

  $sql1 = "SELECT * FROM users WHERE idUsers='$idUser'";
  $result1 = mysqli_query($conn,$sql1);
  $rowcount = mysqli_num_rows($result1);

  $sql = "UPDATE users SET idRole='$idRole' WHERE idUsers='$idUser'";
  if ($conn->query($sql) === TRUE) {
    header("Location: ../profile.php?error=success");
    exit();
  } else {
  echo "Error updating record: " . $conn->error;
  }


    $conn->close();


}
 ?>
