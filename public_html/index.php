<?php
require_once('./controller/controller.php');

$page_whitelist = ["register","login","deconnexion","profile","admin",
                  "editFormation","mesFormation","formations","showFormation",
                  "followFormation","unFollowFormation","upvoteFormation",
                  "forumThread","forumLst","forumShow"];

try {
    checkSession();
    if(isset($_GET['action'])){
      if (!in_array($_GET['action'], $page_whitelist)) {
        echo "NOP";
      }else{
          if ($_GET['action'] === $page_whitelist[0]) {
            notNeedSession();
            register();
          }elseif ($_GET['action'] === $page_whitelist[1]) {
            notNeedSession();
            login();
          }elseif ($_GET['action'] === $page_whitelist[2]){
            deconnexion();
          }
          elseif ($_GET['action'] === $page_whitelist[3]){
            needSession();
            profile();
          }elseif ($_GET['action'] === $page_whitelist[4]){
            needSession();
            admin();
          }elseif ($_GET['action'] === $page_whitelist[5]){
            needSession();
            editFormation();
          }elseif ($_GET['action'] === $page_whitelist[6]){
            needSession();
            mesFormation();
          }elseif ($_GET['action'] === $page_whitelist[7]){
            needSession();
            formations();
          }elseif ($_GET['action'] === $page_whitelist[8]){
            needSession();
            showFormation();
          }elseif ($_GET['action'] === $page_whitelist[9]){
            needSession();
            followFormation();
          }elseif ($_GET['action'] === $page_whitelist[10]){
            needSession();
            unFollowFormation();
          }elseif ($_GET['action'] === $page_whitelist[11]){
            needSession();
            upvoteFormation();
          }elseif ($_GET['action'] === $page_whitelist[12]){
            needSession();
            forumThread();
          }elseif ($_GET['action'] === $page_whitelist[13]){
            needSession();
            forumLst();
          }elseif ($_GET['action'] === $page_whitelist[14]){
            needSession();
            forumShow();
          }
      }
    }else{
      index();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


?>
