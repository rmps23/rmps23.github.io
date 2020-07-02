<?php require "header.php" ?>

<main>


<div class="ct-main">
  <br>
  <form action="includes/create-team.inc.php" method="post">
    <span class="ct-text">Crete Team</span>
    <br>
    <input class="ct-textbox" type="text" name="teamName" placeholder="Team Name">
    <button class="ct-button" type="submit" name="createteam-submit">Create Team</button>
  </form>
</div>
</main>

<?php
require "footer.php"
 ?>
