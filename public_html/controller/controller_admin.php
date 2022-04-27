<?php

function admin(){
  if(checkUserAdmin($_SESSION["id"]) === false){
    header("Location: https://www.leboncoin.fr/prestations_de_services/2096863483.htm");
    die();
  }
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // promote case
    if(isset($_POST['promote'])){

      if(intval($_POST['promote']) !== intval($_SESSION["id"])) {
        if(checkUserId($_POST['promote']) === true){
          if (checkUserAdmin($_POST['promote']) === true) { // is admin
            updateUserRole($_POST['promote'], 'User');
          }else{
            updateUserRole($_POST['promote'], 'Admin');
          }
        }else{
          $error = "WTF";
        }
      }else{
        $error = "auto demote interdit";
      }
    }elseif(isset($_POST['new_pass']) && isset($_POST['b_newpass'])){ // password update case
      if (checkUserId($_POST['b_newpass']) === true) {
        updateUserPass($_POST['b_newpass'], $_POST['new_pass']);
      }else{
        $error = "WTF";
      }
    }elseif(isset($_POST['delete']) && checkUserId($_POST['delete'])){
      if(strval($_SESSION['id']) === $_POST['delete']){
        $error = "Auto suppresion interdit";
      }else{
        deleteUser($_POST['delete']);
      }
    }
  }

  $content = requireToVar("view/admin.php");
  if(isset($error)){
    $content  = $content."<br/>\n";
    $content  = $content."<span>".$error."</span>";
  }
  buildTemplate($content);
}

?>
