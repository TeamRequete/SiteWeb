<?php
require_once('./controller/controller.php');

$page_whitelist = ["register","login"];

try {
    if(isset($_GET['action'])){
      if (!in_array($_GET['action'], $page_whitelist)) {
        echo "NOP";
      }else{
          if ($_GET['action'] === $page_whitelist[0]) {
            register();
          }elseif ($_GET['action'] === $page_whitelist[1]) {
            login();
          }
      }
    }else{
      unauthentified_index();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


?>
