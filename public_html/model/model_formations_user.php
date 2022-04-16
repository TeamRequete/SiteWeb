<?php
// check
function checkUserFormation($user_id, $formation_id){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM formations_user where formation_id=? AND user_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id, $user_id]);
  $ret = intval($stmt->fetch()[0]);
  if($ret === 0){
    return false;


  }
  return true;
}

function checkUpVote($user_id, $formation_id){
  $pdo = dbConnect();
  $sql = "SELECT vote FROM formations_user WHERE user_id=? AND formation_id=?";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$user_id, $formation_id]);
  if(intval($stmt->fetch()[0]) === 1){
    return true;
  }
  return false;
}

// insert
function insertFormationUser($user_id, $formation_id) {
  $pdo = dbConnect();
  $sql = "INSERT INTO formations_user (user_id,formation_id) VALUES (?,?)";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$user_id, $formation_id]);
}

function insertUpVote($user_id, $formation_id, $value){
  $pdo = dbConnect();
  $sql = "UPDATE formations_user SET vote=? WHERE user_id=? AND formation_id=?";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$value, $user_id, $formation_id]);
}

// select
function getFollowFormation($formation_id){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM formations_user where formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id]);
  $size = intval($stmt->fetch(

)[0]);
  return $size;
}

function getVoteFormation($formation_id){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM formations_user where formation_id=? AND vote=1";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id]);
  foreach ($stmt as $row) { // TODO je sais je sais
    $size = intval($row[0]);
  }
  return $size;
}

// delete
function deleteFormationUser($user_id, $formation_id){
  $pdo = dbConnect();
  $sql = "DELETE FROM formations_user WHERE formation_id=? AND user_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id, $user_id]);
}

//dump
function dumpFollowFormation($user_id){
  $pdo = dbConnect();
  $sql = "SELECT * FROM formations WHERE formation_id IN (SELECT formation_id FROM formations_user WHERE user_id=?);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  return $stmt;
}

?>
