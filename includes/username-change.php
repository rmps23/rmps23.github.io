<?php
  session_Start();

if (isset($_POST['confirm-username'])) {
  require "dbh.inc.php";

  $idUser = $_SESSION['userId'];
  $username = $_POST['new-username'];

  $sql1 = "SELECT * FROM users WHERE uidUsers='$username'";
  $result1 = mysqli_query($conn,$sql1);
  $rowcount = mysqli_num_rows($result1);

  if (empty($username)) {
    header("Location: ../profile.php?error=empty");
    exit();
  }else if($rowcount > 0){
    header("Location: ../profile.php?error=usernametaken");
    exit();
  }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../profile.php?error=invalidchar");
    exit();
  }else {
    $sql = "UPDATE users SET uidUsers='$username' WHERE idUsers='$idUser'";
    if ($conn->query($sql) === TRUE) {
      header("Location: ../profile.php?error=success");
      exit();
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();

  }
}
 ?>
