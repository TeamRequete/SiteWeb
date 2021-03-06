<link href="css/forum_thread.css" rel="stylesheet" type="text/css">

<?php $result=dumpForumThread($_GET['forumId']) ?>
<?php if($result->rowCount()>0): ?>

  <forumThread>
      <titre><?php echo(htmlspecialchars(getForum($_GET['id'], $_GET['forumId'])['content'])); ?></titre>
      <?php foreach($result as $row): ?>

      <bulleDiscution>
          <bulleContent>
            <enTete>
                <pseudo><?php echo(htmlspecialchars(getUserLogin($row['user_id']))) ?></pseudo>
                <date><?php echo(htmlspecialchars($row['created_at'])) ?></date>
            </enTete>
            <content>
                <?php echo(buildMarkdown($row['content'])) ?>
            </content>
          </bulleContent>
          <?php if($row['user_id'] === strval($_SESSION['id'])): ?>
            <a href='<?php echo("/index.php?action=forumShow&id=".$_GET['id']."&forumId=".$_GET['forumId']."&threadId=".$row['thread_id']."&delete=true"); ?>'><button id="btnDeleteDiscution" onclick=""></button></a>
          <?php endif; ?>
      </bulleDiscution>

      <?php endforeach; ?>

  </forumTread>
<?php endif; ?>

<form id="createForumThread" method="post" action="<?php echo('index.php?action=forumShow&id='.$_GET['id'].'&forumId='.$_GET['forumId']); ?>">
    <h1>Créer un Post</h1>
    <textarea rows="4" cols="50" name="post" required></textarea><br/>
    <button type="submit">Créer</button>
</form>
