
<?php
$stmt = getFormation($_GET['id'])->fetch();
$xml = simplexml_load_string($stmt['qcm']);
?>



<form action="">
  <?php for($i=0;$i< count($xml->questions->question);$i++): ?>
    <?php $curr = $xml->questions->question[$i];?>
    <fieldset>
    <label> <?php echo(htmlentities($curr->problem[0])); ?> </label><br>
    <?php for($d=0;$d<(count($curr->proposes->proposetrue));$d++): ?>
      <div>
          <input type="checkbox" id="<?php echo($d); ?>" name="<?php echo(strval($i)."|".strval($d)); ?>" value="<?php echo(htmlentities($curr->proposes->proposetrue[$d])) ?>" checked>
          <label for="<?php echo($d); ?>"><?php echo(htmlentities($curr->proposes->proposetrue[$d])); ?></label>
      </div>
    <?php endfor; ?>
    <?php for($d=0;$d<(count($curr->proposes->propose));$d++): ?>
      <div>
          <input type="checkbox" id="<?php echo($d); ?>" name="<?php echo(strval($i)."|".strval($d)); ?>" value="<?php echo(htmlentities($curr->proposes->propose[$d])) ?>">
          <label for="<?php echo($d); ?>"><?php echo(htmlentities($curr->proposes->propose[$d])); ?></label>
      </div>
    <?php endfor; ?>

    </fieldset>
  <?php endfor; ?>
</form>
