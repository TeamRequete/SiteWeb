<link href="view/css/forumLst.css" rel="stylesheet" type="text/css">


<?php $result=dumpForum($_GET['id']); ?>

<tableForumLst>
  <titleForumLst>Threads</titleForumLst>

  <?php if($result->rowCount() > 0): ?>
    <?php foreach($result as $row): ?>
      <a href="<?php echo('/index.php?action=forumShow&id='.$_GET['id'].'&forumId='.$row['forum_id']) ?>">
        <?php echo(htmlspecialchars($row['content'])) ?>
      </a> 
    <?php endforeach; ?>
  <?php endif; ?>
</tableForumLst>

<form id="createForumThread" method="post" action="<?php echo('index.php?action=forumShow&id='.$_GET['id']); ?>">
    <h1>Créer un Thread</h1>
    <formCreateThread>
      <label>Nom</label>
      <input type="text" name="name" required/> <br>
      <button type="submit">Créer</button>
    </formCreateThread>
</form>
