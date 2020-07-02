<?php
  session_Start();

if (isset($_POST['confirm-email'])) {
  require "dbh.inc.php";

  $idUser = $_SESSION['userId'];
  $email = $_POST['new-email'];
  $email2 = $_POST['new-email2'];
  
  $sql1 = "SELECT * FROM users WHERE emailUsers='$email'";
  $result1 = mysqli_query($conn,$sql1);
  $rowcount = mysqli_num_rows($result1);

  if (empty($email) || empty($email2)) {
    header("Location: ../profile.php?error2=empty");
    exit();
  }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../profile.php?error2=emailform");
    exit();
  }else if($email != $email2){
    header("Location: ../profile.php?error2=emaildiff");
    exit();
  }else if($rowcount > 0){
    header("Location: ../profile.php?error2=emailused");
    exit();
  }else {
    $sql = "UPDATE users SET emailUsers='$email' WHERE idUsers='$idUser'";
    if ($conn->query($sql) === TRUE) {
      header("Location: ../profile.php?error2=success");
      exit();
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();

  }



  }

 ?>
