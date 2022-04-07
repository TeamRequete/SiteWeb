<?php
session_start();
require_once("model/model.php");
require_once("model/uploadfile.php");

function index(){
  $content = requireToVar("view/formation_lst.php");
  buildTemplate($content);
}

function register() {
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
    deconnexion();
  }
}

function needSession(){ //TODO ca va pas ca a retravailler
  if(isset($_SESSION['id']) === false || checkUserId($_SESSION['id']) === false){
    deconnexion();
  }
}

function notNeedSession(){
  if (isset($_SESSION['id'])) {
    header("Location: /index.php");
    die();
  }
}

function editFormation(){
  if(isset($_GET['id']) === false || getUserFormation($_SESSION['id'], $_GET['id'])->rowCount()  ==  0){ //check if user is profesor
    header("Location: /index.php");
    die();
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if (isset($_POST['name']) && isset($_POST['duration']) && isset($_POST['content']) && is_numeric($_POST['duration']) &&
    intval($_POST['duration'])>=0) {
        updateUserFormation($_GET['id'], $_POST['name'], $_POST['duration'], $_POST['content']);
        // photo de la formation
        if(isset($_FILES['imgFormation']) && $_FILES['imgFormation']['size']>0){ //un fichier est envoye
          $file_name = secure_save_file($_FILES['imgFormation']);
          deleteFilenameFormation($_GET['id']);
          updateFilenameFormation($_GET['id'], $file_name);
        }

    }else{
      $error = 'variable not set';
    }
  }
  $content = requireToVar("view/editFormation.php");
  if(isset($error)){
    $content  = $content."<br/>\n";
    $content  = $content."<span>".$error."</span>";
  }
  buildTemplate($content);
}

function mesFormation(){
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST["name"]) === true){
      insertFormation($_SESSION['id'], $_POST["name"]);
    }else{
      $error = "WTF poste ton burp frèro";
    }
  }

  $content = requireToVar("view/mesFormation.php");
  if(isset($error)){
    $content  = $content."<br/>\n";
    $content  = $content."<span>".$error."</span>";
  }
  buildTemplate($content);
}

function formations(){
  $content = requireToVar("view/formations.php");
  if(isset($error)){
    $content  = $content."<br/>\n";
    $content  = $content."<span>".$error."</span>";
  }
  buildTemplate($content);
}

function showFormation(){
  if(isset($_GET['id']) === false || checkFormationExist($_GET['id']) === false){
    header("Location: /index.php?action=formations");
    die();
  }
  $content = requireToVar("view/showFormation.php");
  buildTemplate($content);
}

function followFormation(){
  if(isset($_GET['id']) && checkFormationExist($_GET['id'])){
    insertFormationUser($_SESSION['id'], $_GET['id']);
  }

  header("Location: /index.php?action=formations"); //TODO faire en ajax
  die();
}

function unFollowFormation(){
  if(isset($_GET['id']) && checkFormationExist($_GET['id']) ){
    deleteFormationUser($_SESSION['id'], $_GET['id']);
  }

  header("Location: /index.php?action=formations"); //TODO faire en ajax
  die();
}

function upvoteFormation(){
  if(isset($_GET['id']) && checkFormationExist($_GET['id'])){
    if(checkUserFormation($_SESSION['id'], $_GET['id'])){ // le user follow
        if(checkUpVote($_SESSION['id'], $_GET['id'])){
          insertUpVote($_SESSION['id'], $_GET['id'], 0);
        }else{
          insertUpVote($_SESSION['id'], $_GET['id'], 1);
        }
    }
  }
  header("Location: /index.php?action=showFormation&id=".$_GET['id']);
  die();
}

function forumThread(){
  $content = requireToVar("view/forum_thread.php");
  buildTemplate($content);
}

function forumLst(){
  $content = requireToVar("view/forumLst.php");
  buildTemplate($content);
}

function forumShow(){
  if(isset($_GET['id']) === false || checkUserFormation($_SESSION['id'], $_GET['id']) === false){
    header("Location: /index.php?action=forumLst");
    die();
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['name'])){
      insertForum($_SESSION['id'], $_GET['id'], $_POST['name']);
    }
  }
  if(isset($_GET['idThread'])){
    $content = requireToVar("view/forum_thread.php");
  }else{
    $content = requireToVar("view/forumShow.php");
  }

  buildTemplate($content);
}

function buildTemplate($content){
  $header_bar = requireToVar("view/select_bar.php");
  require("view/template.php");
}

function buildMarkdown($content){
  require_once("libs/Parsedown.php");
  $Parsedown = new Parsedown();
  $Parsedown->setSafeMode(true); // miam miam
  return $Parsedown->text($content);
}

?>
