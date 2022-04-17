<?php

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

?>
