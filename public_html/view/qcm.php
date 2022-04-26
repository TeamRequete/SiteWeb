
<?php
$stmt = getFormation($_GET['id'])->fetch();
$xml = simplexml_load_string($stmt['qcm']);
?>



<form action="<?php echo($_SERVER['REQUEST_URI']) ?>" method="post">
  <?php for($i=0;$i< count($xml->questions->question);$i++): ?>
    <?php $curr = $xml->questions->question[$i];
          $magie = xmlFlush($curr);
    ?>
    <fieldset>
    <label> <?php echo(htmlentities($curr->problem[0])); ?> </label><br>
    <?php for($d=0;$d<(count($magie));$d++): ?>
      <div>
          <input type="checkbox" id="<?php echo($d); ?>" name="<?php echo(strval($i)."|".strval($d)); ?>" value="<?php echo(htmlentities($magie[$d])) ?>">
          <label for="<?php echo($d); ?>"><?php echo(htmlentities($magie[$d])); ?></label>
      </div>
    <?php endfor; ?>

    </fieldset>
  <?php endfor; ?>
  <input type="submit" value="Submit">
</form>
