<?php

function forumShow(){
  if(isset($_GET['id']) === false || checkUserFormation($_SESSION['id'], $_GET['id']) === false){ // premier id
    header("Location: /index.php?action=forumLst");
    die();
  }
  if(isset($_GET['forumId']) && checkForum($_GET['forumId']) === false){// deuxieme id
    header("Location: /index.php?action=forumShow&id=".$_GET['id']);
    die();
  }
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['name'])){
      insertForum($_SESSION['id'], $_GET['id'], $_POST['name']);
    }
    if(isset($_POST['post'])){
      insertForumThread($_SESSION['id'], $_GET['forumId'], $_POST['post']);
    }
  }
  if(isset($_GET['forumId'])){
    $content = requireToVar("view/forum_thread.php");
  }else{
    $content = requireToVar("view/forumShow.php");
  }

  buildTemplate($content);
}

?>
