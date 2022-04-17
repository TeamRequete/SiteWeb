<?php

function editFormation(){
  if(checkUserAdmin($_SESSION['id']) == false &&(isset($_GET['id']) === false || getUserFormation($_SESSION['id'], $_GET['id'])->rowCount()  ==  0)){ //check if user is profesor or admin
    header("Location: /index.php");
    die();
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if (isset($_POST['name']) && isset($_POST['duration']) && isset($_POST['content']) && isset($_POST['qcm']) && is_numeric($_POST['duration']) &&
    intval($_POST['duration'])>=0) {
        updateUserFormation($_GET['id'], $_POST['name'], $_POST['duration'], $_POST['content'], $_POST['qcm']);
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

?>
