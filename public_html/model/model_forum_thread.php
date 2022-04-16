<?php

// insert
function insertForumThread($user_id, $forum_id,$content){
  $pdo = dbConnect();
  $sql = "INSERT INTO forum_thread (forum_id,user_id,content) VALUES (?,?,?)";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$forum_id, $user_id, $content]);
}

// dump
function dumpForumThread($forum_id){
  $pdo = dbConnect();
  $sql = "SELECT * FROM forum_thread WHERE forum_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$forum_id]);
  return $stmt;
}

?>
