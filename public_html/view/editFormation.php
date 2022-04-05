<!-- a changer -->
<link href="view/css/admin.css" rel="stylesheet" type="text/css">
<link href="view/css/editFormation.css" rel="stylesheet" type="text/css">

<?php
$stmt=getUserFormation($_SESSION['id'], $_GET['id'])->fetch();
?>


<form class="" action="<?php echo("index.php?action=editFormation&id=".$_GET['id']); ?>" method="post" enctype="multipart/form-data">
  <section id="properties">
    <label for="name">Nom</label>
    <input type="text" name="name" value="<?php echo(htmlspecialchars($stmt['name'])); ?>">
    <label for="duration">Durée en heures</label>
    <input type="number" name="duration" value="<?php echo(htmlspecialchars($stmt['duration'])); ?>">
    <!-- input file -->
    <label for="imgFormation">Image de la formation:</label>
    <input type="file"
       id="imgFormation" name="imgFormation"
       accept="image/png, image/jpg, image/gif">
  </section>
  <section id="contentFormation">
    <label for="content">formation content (MarkDown)</label>
    <textarea id="story" name="content"
              rows="20" cols="50"><?php echo(htmlspecialchars($stmt['content'])); ?></textarea>
    <button type="submit" name="button">commit</button>
  </section>
</form>

<br/>
<br/>

<h1>Preview</h1>
<br/>
<section id="preview">
  <?php echo(buildMarkdown($stmt['content'])) ?>
</section>
