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
      // creation d'un salon
      if(isset($_POST['name'])){
        insertForum($_SESSION['id'], $_GET['id'], $_POST['name']);
      }
      // creation d'une reponse dans un salon
      if(isset($_POST['post'])){
        insertForumThread($_SESSION['id'], $_GET['forumId'], $_POST['post']);
      }
  }

  $flag=true;
  //Suppresion
  if(isset($_GET['delete'])){
      // on supprime le post
      if(isset($_GET['threadId'])){ // suppresion de reponse
        deleteForumThread($_SESSION['id'], $_GET['threadId']);
      }else{// on supprime un salon
        // pas de check a faire car l'utilisateur ne peux supprimer que ses propre poste (IE session)
        deleteForum($_SESSION['id'], $_GET['forumId']);
        $flag=false;
      }
  }

  if(isset($_GET['forumId']) && $flag === true){
    $content = requireToVar("view/forum_thread.php");
  }else{
    $content = requireToVar("view/forumShow.php");
  }

  buildTemplate($content);
}

?>
