<?php
  setcookie("name", "", time() - 60);
  header("location: log_in_form.php");
?>