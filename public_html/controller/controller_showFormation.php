<?php

function showFormation(){
  if(isset($_GET['id']) === false || checkFormationExist($_GET['id']) === false){
    header("Location: /index.php?action=formations");
    die();
  }
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $stmt=getFormation($_GET['id'])->fetch();
    $xml = simplexml_load_string($stmt['qcm']);
    $total = count($xml->questions->question);
    $ret = array();
    for ($i=0; $i < $total; $i++) {
      array_push($ret,count($xml->questions->question[$i]->proposes->proposetrue));
    }
    foreach ($_POST as $key => $value) {
      if(strlen($key) === 3 && strpos($key[1],"|") !== false){
        $tab = explode("|", $key);
        $fst = intval($tab[0]);
        if ($fst < $total) {
          for ($i=0; $i < count($xml->questions->question[$fst]->proposes->proposetrue); $i++) {
            if(htmlentities($xml->questions->question[$fst]->proposes->proposetrue[$i]) === htmlentities($value)){
              $ret[$fst] -= 1;
            }
          }
        }
      }
    }
    $nbReponse = 0;
    for ($i=0; $i < $total; $i++) {
      if($ret[$i] <= 0){
        $nbReponse+=1;
      }
    }
    updateFormationUserQcm($_SESSION['id'], $_GET['id'], strval($nbReponse).'/'.strval($total));
  }
  $content = requireToVar("view/showFormation.php");
  buildTemplate($content);
}

?>
