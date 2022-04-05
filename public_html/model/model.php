<?php
function requireToVar($file_name){
  ob_start();
  require($file_name);
  return ob_get_clean();
}


function insertUser($user_login, $user_pass, $user_email) {
  $pdo = dbConnect();
  $salt = bin2hex(random_bytes(6));
  $user_pass = crypt($user_pass,'$6$rounds=5000$'.$salt.'$');
  $sql = "INSERT INTO users (user_login, user_pass, user_email, role) VALUES (?, ?, ?, 'User')";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$user_login, $user_pass, $user_email]);
}

function insertFormation($user_id,$name) {
  $pdo = dbConnect();
  $sql = "INSERT INTO formations (name,prof_id,content,duration) VALUES (?,?,'',0)";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$name,$user_id]);
}

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


function checkUserExist($user_email){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM users where user_email=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_email]);
  foreach ($stmt as $row) { //TODO goto ligne 54
    $ret = intval($row[0]);
  }
  if($ret === 0){
    return false;
  }
  return true;
}

function checkFormationExist($formation_id){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM formations where formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id]);
  foreach ($stmt as $row) { // a changer sans le foreach TODO goto ligne 40
    $ret = intval($row[0]);
  }
  if($ret === 0){
    return false;
  }
  return true;
}

function checkUserFormation($user_id, $formation_id){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM formations_user where formation_id=? AND user_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id, $user_id]);
  foreach ($stmt as $row) { // a changer sans le foreach TODO
    $ret = intval($row[0]);
  }
  if($ret === 0){
    return false;
  }
  return true;
}

function checkUserLogin($user_email, $user_pass){
  $pdo = dbConnect();
  $sql = "SELECT user_pass FROM users where user_email=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_email]);
  foreach ($stmt as $row) {
    $hashpass = $row[0];
  }
  if(isset($hashpass)){
    $format = substr($hashpass,0 , 28);
    if(crypt($user_pass, $format) === $hashpass){
      return true;
    }
  }
  return false;
}

function checkUserAdmin($user_id){
  $pdo = dbConnect();
  $sql = "SELECT role FROM users where ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  foreach ($stmt as $row) {
    $role = $row[0];
  }
  if($role === "Admin"){
    return true;
  }
  return false;

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

function getUserId($user_email){
  $pdo = dbConnect();
  $sql = "SELECT ID FROM users where user_email=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_email]);
  foreach ($stmt as $row) {
    $id = $row[0];
  }
  return intval($id);
}

function getUserLogin($user_id){
  $pdo = dbConnect();
  $sql = "SELECT user_login FROM users where ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  foreach ($stmt as $row) {
    $login = $row[0];
  }
  return $login;
}


function getUserEmail($user_id){
  $pdo = dbConnect();
  $sql = "SELECT user_email FROM users where ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  foreach ($stmt as $row) {
    $email = $row[0];
  }
  return $email;
}

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

function getFollowFormation($formation_id){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM formations_user where formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id]);
  foreach ($stmt as $row) { // TODO je sais faut que je regarde comment faire propre
    $size = intval($row[0]);
  }
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

function checkUserId($user_id){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM users where ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  foreach ($stmt as $row) {
    $size = intval($row[0]);
  }
  if($size === 1){
    return true;
  }
  return false;
}


function updateUserEmail($user_id, $user_email){
  $pdo = dbConnect();
  $sql = "UPDATE users SET user_email=? WHERE ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_email, $user_id]);
}

function updateUserPass($user_id, $user_clear_pass){
  $salt = bin2hex(random_bytes(6));
  $user_pass = crypt($user_clear_pass,'$6$rounds=5000$'.$salt.'$');
  $pdo = dbConnect();
  $sql = "UPDATE users SET user_pass=? WHERE ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_pass, $user_id]);
}

function updateUserLogin($user_id, $user_login){
  $pdo = dbConnect();
  $sql = "UPDATE users SET user_login=? WHERE ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_login, $user_id]);
}

function updateUserRole($user_id, $role){
  $pdo = dbConnect();
  $sql = "UPDATE users SET role=? WHERE ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$role, $user_id]);
}

function updateFormation($formation_id, $name, $content, $duration) {
  $pdo = dbConnect();
  $sql = "UPDATE formations SET name=?,content=?,duration=? WHERE formation_id=?";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$name, $content, $duration, $formation_id]);
}

function updateUserFormation($formation_id, $name, $duration, $content){
  $pdo = dbConnect();
  $sql = "UPDATE formations SET name=?, duration=?, content=? WHERE formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$name, $duration, $content, $formation_id]);
}

function updateFilenameFormation($formation_id, $fileName){
  $pdo = dbConnect();
  $sql = "UPDATE formations SET filename=? WHERE formation_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$fileName, $formation_id]);
}

function dumpUser(){
  $pdo = dbConnect();
  $sql = "SELECT * FROM users";
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

function dumpFormation(){
  $pdo = dbConnect();
  $sql = "SELECT * FROM formations";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([]);
  return $stmt;
}

function dumpFollowFormation($user_id){
  $pdo = dbConnect();
  $sql = "SELECT * FROM formations WHERE formation_id IN (SELECT formation_id FROM formations_user WHERE user_id=?);";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  return $stmt;
}

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

function deleteFormationUser($user_id, $formation_id){
  $pdo = dbConnect();
  $sql = "DELETE FROM formations_user WHERE formation_id=? AND user_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$formation_id, $user_id]);
}




function deconnexion(){
  session_destroy();
  header("Location: /index.php");
  die();
}

function dbConnect(){
    $db = new PDO('mysql:host=mysql;dbname=team_requete;charset=utf8', 'root', 'placeholder');
    return $db;
}

?>
