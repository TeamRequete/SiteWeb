<?php

// insert
function insertForumThread($user_id, $forum_id,$content){
  $pdo = dbConnect();
  $sql = "INSERT INTO forum_thread (forum_id,user_id,content) VALUES (?,?,?)";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$forum_id, $user_id, $content]);
}

//delete
function deleteForumThread($user_id, $thread_id){
  $pdo = dbConnect();
  $sql = "DELETE FROM forum_thread WHERE thread_id=? AND user_id=?";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$thread_id, $user_id]);
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
