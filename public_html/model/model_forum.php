<?php

//check
function checkForum($forum_id){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM forum where forum_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$forum_id]);
  if(intval($stmt->fetch()[0]) === 1){
    return true;
  }
  return false;
}

// insert
function insertForum($user_id, $formation_id, $name){
  $pdo = dbConnect();
  $sql = "INSERT INTO forum (formation_id,user_id,content) VALUES (?,?,?)";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$formation_id, $user_id, $name]);
}

//select
function getForum($formation_id, $forum_id){
  $pdo = dbConnect();
  $sql = "SELECT * FROM forum WHERE formation_id=? AND forum_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id, $forum_id]);
  return $stmt->fetch();
}

//delete
function deleteForum($user_id, $forum_id){
  $pdo = dbConnect();
  $sql = "DELETE FROM forum WHERE forum_id=? AND user_id=?";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$forum_id, $user_id]);
}

// dump
function dumpForum($formation_id){
  $pdo = dbConnect();
  $sql = "SELECT * FROM forum WHERE formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id]);
  return $stmt;
}

?>
