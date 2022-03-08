<?php
function requireToVar($file_name){
  ob_start();
  require($file_name);
  return ob_get_clean();
}


function insertUser($user_login, $user_pass, $user_email) {
  $pdo = dbConnect();
  $salt = bin2hex(random_bytes(6));
  echo "<h1>".$user_pass."</h1>";
  $user_pass = crypt($user_pass,'$6$rounds=5000$'.$salt.'$');
  echo "<h1>".$user_pass."</h1>";
  $sql = "INSERT INTO users (user_login, user_pass, user_email, role) VALUES (?, ?, ?, 'User')";
  $stmt= $pdo->prepare($sql);
  $stmt->execute([$user_login, $user_pass, $user_email]);
}

function checkUserExist($user_email){
  $pdo = dbConnect();
  $sql = "SELECT COUNT(*) FROM users where user_email=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$user_email]);
  foreach ($stmt as $row) {
    $ret = intval($row[0]);
  }
  return $ret;
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

function dbConnect(){
    $db = new PDO('mysql:host=127.0.0.1;dbname=team_requete;charset=utf8', 'root', 'placeholder');
    return $db;
}

?>
