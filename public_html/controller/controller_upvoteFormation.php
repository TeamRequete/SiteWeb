<?php

function upvoteFormation(){
  if(isset($_GET['id']) && checkFormationExist($_GET['id'])){
    if(checkUserFormation($_SESSION['id'], $_GET['id'])){ // le user follow
        if(checkUpVote($_SESSION['id'], $_GET['id'])){
          insertUpVote($_SESSION['id'], $_GET['id'], 0);
        }else{
          insertUpVote($_SESSION['id'], $_GET['id'], 1);
        }
    }
  }
  header("Location: /index.php?action=showFormation&id=".$_GET['id']);
  die();
}

?>
