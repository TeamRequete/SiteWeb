<?php
session_start();
require_once("model/model.php");
// active les erreurs il faut retirer ca en prod
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//

function index(){
  $content = requireToVar("view/formation_lst.php");
  buildTemplate($content);
}

function register() {
    if (isset($_SESSION['id'])) {
      header("Location: /index.php");
      die();
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      // check si tout les champ sont set
      if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['pass'])){
        //check de la taille
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && strlen($_POST['email']) < 255 && strlen($_POST['username']) < 255) {
          // check si le compte existe deja
          if (checkUserExist($_POST['email']) === false) {
            insertUser($_POST['username'], $_POST['pass'], $_POST['email']);
            $id = getUserId($_POST['email']);
            $_SESSION['id'] = $id;
            header("Location: /index.php");
            die();
          }
          $error = "Votre email est deja utilisé";
        }else{
          $error  = "la taille des champs ne doit pas dépasser 255 caractere.";
        }
      }else{
        $error = "WTF";
      }
    }

    $content = requireToVar("view/signin.php");
    if(isset($error)){
      $content  = $content."<br/>\n";
      $content  = $content."<span>".$error."</span>";
    }
    buildTemplate($content);
}

function login() {
  if (isset($_SESSION['id'])) {
    header("Location: /index.php");
    die();
  }
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // check si tout les champ sont set
    if(isset($_POST['email']) && isset($_POST['pass'])){
        if (checkUserLogin($_POST['email'], $_POST['pass']) === true) {
          $_SESSION['id'] = getUserId($_POST['email']);
          header("Location: /index.php");
          die();
        }else{
          $error = "Auth failed";
        }
    }else{
      $error = "WTF";
    }
  }

  $content = requireToVar("view/login.php");
  if(isset($error)){
    $content  = $content."<br/>\n";
    $content  = $content."<span>".$error."</span>";
  }
  buildTemplate($content);
}

function profile(){
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // check si tout les champ sont set
    if(isset($_POST['email']) && isset($_POST['last_pass'])){
      if (checkUserLogin(getUserEmail($_SESSION['id']), $_POST['last_pass']) === true) {
        if($_POST['email'] !==  getUserEmail($_SESSION['id'])){
          updateUserEmail($_SESSION['id'], $_POST['email']);
        }
        if(isset($_POST['pass']) && $_POST['pass'] !== ""){
          updateUserPass($_SESSION['id'], $_POST['pass']);
        }
        if(isset($_POST['username']) && $_POST['username'] !== getUserLogin($_SESSION['id'])){
          updateUserLogin($_SESSION['id'], $_POST['username']);
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
    }
  }

  $content = requireToVar("view/admin.php");
  if(isset($error)){
    $content  = $content."<br/>\n";
    $content  = $content."<span>".$error."</span>";
  }
  buildTemplate($content);
}

function checkSession(){
  if(isset($_SESSION['id']) && checkUserId($_SESSION['id']) === false){
    session_destroy();
    header("Location: /index.php");
  }
}

function buildTemplate($content){
  $header_bar = requireToVar("view/select_bar.php");
  require("view/template.php");
}

?>
