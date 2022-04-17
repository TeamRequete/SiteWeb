<?php

function forumThread(){
  $content = requireToVar("view/forum_thread.php");
  buildTemplate($content);
}

?>
