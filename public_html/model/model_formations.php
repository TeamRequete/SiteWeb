<?php
// check
function checkFormationExist($formation_id){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM formations where formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id]);
  $ret = intval($stmt->fetch()[0]);
  if($ret === 0){
    return false;
  }
  return true;
}

// insert
function insertFormation($user_id,$name) {
  $pdo = dbConnect();
  $sql = "INSERT INTO formations (name,prof_id,content,duration) VALUES (?,?,'',0)";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$name,$user_id]);
}

// select
function getUserFormation($user_id,$formation_id){
  $pdo = dbConnect();
  $sql = "SELECT * FROM formations where formation_id=? and prof_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id, $user_id]);
  return $stmt;
}

function getFormation($formation_id){
  $pdo = dbConnect();
  $sql = "SELECT * FROM formations where formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id]);
  return $stmt;
}

// update
function updateFormation($formation_id, $name, $content, $duration) {
  $pdo = dbConnect();
  $sql = "UPDATE formations SET name=?,content=?,duration=? WHERE formation_id=?";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$name, $content, $duration, $formation_id]);
}

function updateUserFormation($formation_id, $name, $duration, $content, $qcm){
  $pdo = dbConnect();
  $sql = "UPDATE formations SET name=?, duration=?, content=?, qcm=? WHERE formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$name, $duration, $content,$qcm, $formation_id]);
}

function updateFilenameFormation($formation_id, $fileName){
  $pdo = dbConnect();
  $sql = "UPDATE formations SET filename=? WHERE formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$fileName, $formation_id]);
}

// delete
function deleteFilenameFormation($formation_id){
  $pdo = dbConnect();
  $sql = "SELECT filename FROM formations where formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id]);
  foreach ($stmt as $row) {
    if ($row[0] !== '') {
      $fileName = __DIR__."/../uploads/".$row[0];
      if(file_exists($fileName)){
        unlink($fileName);
      }
    }
  }

  $sql = "UPDATE formations SET filename='' where formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id]);
}

// dump
function dumpFormation(){
  $pdo = dbConnect();
  $sql = "SELECT * FROM formations";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([]);
  return $stmt;
}

function dumpUserFormation($user_id){
  $pdo = dbConnect();
  $sql = "SELECT * FROM formations WHERE prof_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  return $stmt;
}

?>
