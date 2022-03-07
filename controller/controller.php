<?php
require_once("model/model.php");

function unauthentified_index(){
  
  $header_bar = requireToVar("view/select_bar.php");
  require("view/template.php");
}

?>
