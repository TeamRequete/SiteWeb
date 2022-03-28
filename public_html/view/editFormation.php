<!-- a changer -->
<link href="view/css/admin.css" rel="stylesheet" type="text/css">

<?php
$stmt=getUserFormation($_SESSION['id'], $_GET['id'])->fetch();
?>


<form class="" action="<?php echo("index.php?action=editFormation&id=".$_GET['id']); ?>" method="post">
  <label for="name">Nom</label>
  <input type="text" name="name" value="<?php echo(htmlspecialchars($stmt['name'])); ?>"><br/>
  <label for="duration">Durée en heures</label>
  <input type="number" name="duration" value="<?php echo(htmlspecialchars($stmt['duration'])); ?>"><br/>
  <label for="content">formation content (MarkDown)</label>
  <textarea id="story" name="content"
            rows="20" cols="50"><?php echo(htmlspecialchars($stmt['content'])); ?></textarea><br>
  <button type="submit" name="button">commit</button>
</form>

<br/>
<br/>

<h2>Preview</h2>
<br/>

<?php echo(buildMarkdown($stmt['content'])) ?>
