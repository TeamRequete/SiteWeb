<?php $result=dumpFollowFormation($_SESSION['id']); ?>
<?php if($result->rowCount() > 0): ?>

    <?php foreach($result as $row): ?>
        <h1><a href="<?php echo("index.php?action=forumShow&id=".$row["formation_id"]); ?>"><?php echo(htmlspecialchars($row['name'])) ?></a></h1>
    <?php endforeach; ?>

<?php endif; ?>
