<?php
session_Start();

if (isset($_POST['submit'])) {
  require "dbh.inc.php";

  $idUser = $_SESSION['userId'];
  if (isset($_GET['idTeam'])) {
    $idTeam = $_GET['idTeam'];
    echo $idTeam;

  $file = $_FILES['file'];
  $fileName = $file['name'];
  $fileTmp = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['name'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png', 'pdf');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 1000000) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = '../uploads-img/'.$fileNameNew;
        move_uploaded_file($fileTmp, $fileDestination);

        $sql1 = "SELECT * FROM teams WHERE idTeams='$idTeam'";
        $result1 = mysqli_query($conn,$sql1);
        $rowcount = mysqli_num_rows($result1);
/*
        if($rowcount != 0){
          if ($row = mysqli_fetch_assoc($result)) {
            $rowImg = $row['teamLogo'];

            unlink($rowImg);

          }

        }
*/
        $sql = "UPDATE teams SET teamLogo='$fileNameNew' WHERE idTeams='$idTeam'";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../my-teams.php");
        } else {
        echo "Error updating record: " . $conn->error;
        }

      }else {
        echo "Your file is too big!";
      }
    }else {
      echo "There was an error!";
    }
  }else {
    echo "You cannot upload files of this type!";
  }

  }
}

 ?>
