<?php

function index(){
  checkSession();
  $content = requireToVar("view/mainPage.php");
  buildTemplate($content);
}

?>
