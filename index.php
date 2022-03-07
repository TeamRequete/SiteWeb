<?php
require_once('./controller/controller.php');


try {
    if(isset($_GET['page'])){

    }else{
      unauthentified_index();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


?>
