<?php

require "includes/dbh.inc.php";
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOLSCOUT</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>

<main>
<span class="login-signup-exit"><a href="index.php">x</a></span>
<br><br>
<div class="main-login">
<p class="login-title">Signup</p>
<?php
  if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
      ?>
       <div class="alert-box-red">
         <?php
         echo '<p>Fill in all the fields !</p>';
          ?>
       </div>
      <?php
    }
    else if ($_GET['error'] == "invaliduid") {
      ?>
       <div class="alert-box-red">
         <?php
         echo '<p>Invalid username !</p>';
          ?>
       </div>
      <?php
    }
    else if ($_GET['error'] == "invaliduid") {
      ?>
       <div class="alert-box-red">
         <?php
         echo '<p>Invalid email or username !</p>';
          ?>
       </div>
      <?php
    }
    else if ($_GET['error'] == "invalidemail") {
      ?>
       <div class="alert-box-red">
         <?php
         echo '<p>Invalid email !</p>';
          ?>
       </div>
      <?php
    }
    else if ($_GET['error'] == "passwordcheck") {
      ?>
       <div class="alert-box-red">
         <?php
         echo '<p>Passwords dont match !</p>';
          ?>
       </div>
      <?php
    }
  }

 ?>
<br>
<p class="login-text">------------------------------------------------------------------------------</p>
<br>
<form action="includes/signup.inc.php" method="post">
  <input class="reg-textbox" type="text" name="uid" placeholder="Username">
  <br>
  <input class="reg-textbox" type="text" name="mail" placeholder="Email">
  <br>
  <input class="reg-textbox" type="password" name="pwd" placeholder="Password">
  <br>
  <input class="reg-textbox" type="password" name="pwd-repeat" placeholder="Repeat Password">
  <br>
  <button class="reg-button" type="submit" name="signup-submit">Signup</button>
</form>
<br><br>
<p class="login-text">------------------------------------------------------------------------------</p>
<br><br>
<p class="login-text">If you already have an account.</p>
<button onclick="window.location.href='login.php'" class="login-button">Login</button>
<br><br><br><br>
</div>
</main>

</html>
