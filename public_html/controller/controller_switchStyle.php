<?php

function switchStyle() {
  if(!isset($_SESSION['style'])){
    $_SESSION['style'] = true;
  }else{
    $_SESSION['style'] = !$_SESSION['style'];
  }
}

?>
