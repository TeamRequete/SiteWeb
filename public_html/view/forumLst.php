<link href="view/css/forumLst.css" rel="stylesheet" type="text/css">

<?php $result=dumpFollowFormation($_SESSION['id']); ?>
<?php if($result->rowCount() > 0): ?>
<tableForumLst>
    <titleForumLst>Forum formations suivis</titleForumLst>

    <?php foreach($result as $row): ?>
        <a href="<?php echo("index.php?action=forumShow&id=".$row["formation_id"]); ?>">
            <?php echo(htmlspecialchars($row['name'])) ?>
        </a>
    <?php endforeach; ?>

</tableForumLst>
<?php endif; ?>
