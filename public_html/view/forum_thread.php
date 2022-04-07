<link href="view/css/forum_thread.css" rel="stylesheet" type="text/css">

<?php $result=dumpForumThread($_GET['forumId']) ?>
<?php if($result->rowCount()>0): ?>

  <forumThread>
      <titre><?php echo(htmlspecialchars(getForum($_GET['id'], $_GET['forumId'])['content'])); ?></titre>
      <?php foreach($result as $row): ?>
        
      <bulleDiscution>
          <enTete>
              <pseudo><?php echo(htmlspecialchars(getUserLogin($row['user_id']))) ?></pseudo>
              <date><?php echo(htmlspecialchars($row['created_at'])) ?></date>
          </enTete>
          <content>
              <?php echo(htmlspecialchars($row['content'])) ?>
          </content>
      </bulleDiscution>

      <?php endforeach; ?>

  </forumTread>
<?php endif; ?>

<form id="createForumThread" method="post" action="<?php echo('index.php?action=forumShow&id='.$_GET['id'].'&forumId='.$_GET['forumId']); ?>">
    <h1>Créer un Post</h1>
    <textarea rows="4" cols="50" name="post" required></textarea><br/>
    <button type="submit">Créer</button>
</form>
