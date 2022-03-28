<!-- a changer -->
<link href="view/css/admin.css" rel="stylesheet" type="text/css">


<form class="" action="<?php echo("index.php?action=editFormation&id=".$_GET['id']); ?>" method="post">
  <label for="name">Nom</label>
  <input type="text" name="name" value=""><br/>
  <label for="duration">Durée en heures</label>
  <input type="number" name="duration" value=""><br/>
  <label for="content">formation content (MarkDown)</label>
  <textarea id="story" name="content"
            rows="20" cols="50"></textarea>
</form>
