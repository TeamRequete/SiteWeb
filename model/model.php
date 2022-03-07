<?php
function requireToVar($file_name){
  ob_start();
  require($file_name);
  return ob_get_clean();
}

?>
