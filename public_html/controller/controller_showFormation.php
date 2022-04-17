<?php

function showFormation(){
  if(isset($_GET['id']) === false || checkFormationExist($_GET['id']) === false){
    header("Location: /index.php?action=formations");
    die();
  }
  $content = requireToVar("view/showFormation.php");
  buildTemplate($content);
}

?>
