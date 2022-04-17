<link href="view/css/forumLst.css" rel="stylesheet" type="text/css">


<?php $result=dumpForum($_GET['id']); ?>

<tableForumLst>
  <titleForumLst>Threads</titleForumLst>

  <?php if($result->rowCount() > 0): ?>
    <?php foreach($result as $row): ?>
      <threads>
        <a href="<?php echo('/index.php?action=forumShow&id='.$_GET['id'].'&forumId='.$row['forum_id']) ?>">
          <?php echo(htmlspecialchars($row['content'])) ?>
        </a>
        <?php if($row['user_id'] === strval($_SESSION['id'])): ?>
          <a href="<?php echo('/index.php?action=forumShow&id='.$_GET['id'].'&forumId='.$row['forum_id'].'&delete=true') ?>"><button id="btnDeleteThread" onclick=""></button></a>
        <?php endif; ?>
      </threads>
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
