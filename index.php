<?php
require_once('./controller/controller.php');

$page_whitelist = ["register","login","deconnexion","profile","admin"];

try {
    checkSession();
    if(isset($_GET['action'])){
      if (!in_array($_GET['action'], $page_whitelist)) {
        echo "NOP";
      }else{
          if ($_GET['action'] === $page_whitelist[0]) {
            register();
          }elseif ($_GET['action'] === $page_whitelist[1]) {
            login();
          }elseif ($_GET['action'] === $page_whitelist[2]){
            deconnexion();
          }
          elseif ($_GET['action'] === $page_whitelist[3]){
            profile();
          }elseif ($_GET['action'] === $page_whitelist[4]){
            admin();
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
