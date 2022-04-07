
<?php $result=dumpForum($_GET['id']); ?>

<?php if($result->rowCount() > 0): ?>
  <?php foreach($result as $row): ?>
    <h1> <a href="<?php echo('/index.php?action=forumShow&id='.$_GET['id'].'&idThread='.$row['forum_id']) ?>"><?php echo(htmlspecialchars($row['content'])) ?></a> </h1>
  <?php endforeach; ?>
<?php endif; ?>


<form id="createForumThread" method="post" action="<?php echo('index.php?action=forumShow&id='.$_GET['id']); ?>">
    <h1>Crée un Thread</h1>
    <label>Nom</label>
    <input type="text" name="name" required/> <br>
    <button type="submit">Créer</button>
</form>
