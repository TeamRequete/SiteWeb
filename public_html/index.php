<?php
require_once('./controller/controller.php');

$page_whitelist = ["register","login","deconnexion","profile","admin","editFormation","mesFormation"];

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
