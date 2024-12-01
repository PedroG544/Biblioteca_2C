<?php
  //include our connection
  include 'config.php';

  //delete the row of selected id
  $sql = "DELETE FROM livros WHERE rowid = '".$_GET['id']."'";
  $db->query($sql);

  header('location: cadastro.php');
?>