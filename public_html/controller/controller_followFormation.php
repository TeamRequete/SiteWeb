<?php

function followFormation(){
  if(isset($_GET['id']) && checkFormationExist($_GET['id'])){
    insertFormationUser($_SESSION['id'], $_GET['id']);
  }

  header("Location: /index.php?action=formations"); //TODO faire en ajax
  die();
}

?>
