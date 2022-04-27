<?php

//check
function checkUserExist($user_email){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM users where user_email=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_email]);
  $ret = intval($stmt->fetch()[0]);
  if($ret === 0){
    return false;
  }
  return true;
}

function checkUserAdmin($user_id){
  $pdo = dbConnect();
  $sql = "SELECT role FROM users where ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  $ret = $stmt->fetch();

  if($ret && $ret[0] === "Admin"){
    return true;
  }
  return false;

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

function checkUserId($user_id){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM users where ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
  $size = intval($stmt->fetch()[0]);

  if($size === 1){
    return true;
  }
  return false;
}

// insert
function insertUser($user_login, $user_pass, $user_email) {
  $pdo = dbConnect();
  $salt = bin2hex(random_bytes(6));
  $user_pass = crypt($user_pass,'$6$rounds=5000$'.$salt.'$');
  $sql = "INSERT INTO users (user_login, user_pass, user_email, role) VALUES (?, ?, ?, 'User')";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$user_login, $user_pass, $user_email]);
}

// select
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
  return $stmt->fetch()[0];
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

//update
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

// delete
function deleteUser($user_id){
  $pdo = dbConnect();
  $sql = "DELETE FROM users WHERE ID=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_id]);
}

//dump
function dumpUser(){
  $pdo = dbConnect();
  $sql = "SELECT * FROM users";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([]);
  return $stmt;
}

?>
