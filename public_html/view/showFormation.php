<!-- a changer -->
<link href="css/admin.css" rel="stylesheet" type="text/css">
<link href="css/showFormation.css" rel="stylesheet" type="text/css">

<!-- Affiche la formations -->
<?php $stmt=getFormation($_GET['id'])->fetch(); ?>

<h1><?php echo(htmlspecialchars($stmt['name'])); ?></h1>
<h2>La formation dure: <?php echo(htmlspecialchars($stmt['duration'])); ?> H </h2>
<br>
<br>
<showFormation><?php echo(buildMarkdown($stmt['content'])); ?></showFormation>

<br/>
<?php $ret = getFormationUserQcm($_SESSION['id'], $_GET['id']);?>
<?php if($ret===''): ?>
<h1>QCM</h1>
  <section>
    <p>Vous devez follow la formation pour avoir accés aux qcm</p>
  </section>
<?php else: ?>
  <h1>QCM <?php echo("Score: ".$ret); ?></h1>
  <section>
    <?php
      echo(requireToVar("view/qcm.php"));
    ?>
  </section>
<?php endif; ?>

<br/>
<br/>

<?php if(checkUserFormation($_SESSION['id'], $_GET['id'])): ?>
  <?php if(checkUpVote($_SESSION['id'], $_GET['id'])): ?>
    <a href="<?php echo("index.php?action=upvoteFormation&id=".$stmt["formation_id"]); ?>"><button type="submit" value="<?php echo($row['formation_id']); ?>">DownVote</button></a>
  <?php else: ?>
    <a href="<?php echo("index.php?action=upvoteFormation&id=".$stmt["formation_id"]); ?>"><button type="submit" value="<?php echo($row['formation_id']); ?>">UpVote</button></a>
  <?php endif; ?>
<?php endif; ?>
