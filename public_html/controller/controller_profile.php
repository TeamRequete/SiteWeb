<?php

function profile(){
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $error="";
    // check si tout les champ sont set
    if(isset($_POST['email']) && isset($_POST['last_pass'])){
      if (checkUserLogin(getUserEmail($_SESSION['id']), $_POST['last_pass']) === true) {
        if($_POST['email'] !==  getUserEmail($_SESSION['id'])){
          if (checkUserExist($_POST['email']) === false && strlen($_POST['email']) < 255) {
              updateUserEmail($_SESSION['id'], $_POST['email']);
          }else{
              $error = $error."Email invalide ou déjà utilisé\n";
          }
        }
        if(isset($_POST['pass']) && $_POST['pass'] !== ""){
          updateUserPass($_SESSION['id'], $_POST['pass']);
        }
        if(isset($_POST['username']) && $_POST['username'] !== getUserLogin($_SESSION['id'])){
          if(strlen($_POST['username']) < 255){
            updateUserLogin($_SESSION['id'], $_POST['username']);
          }else{
            $error = $error."nom d'utilisateur trop grand\n";
          }
        }

      }else{
        $error = "Password actuelle pas bon";
      }
    }else{
      $error = "WTF";
    }
  }

  $content = requireToVar("view/profile.php");
  if(isset($error)){
    $content  = $content."<br/>\n";
    $content  = $content."<span>".$error."</span>";
  }
  buildTemplate($content);
}

?>
