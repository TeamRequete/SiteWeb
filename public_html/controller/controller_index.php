<?php

function index(){
  $content = requireToVar("view/mainPage.php");
  buildTemplate($content);
}

?>
