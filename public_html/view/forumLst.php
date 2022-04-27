<link href="css/forumLst.css" rel="stylesheet" type="text/css">

<?php $result=dumpFollowFormation($_SESSION['id']); ?>
<?php if($result->rowCount() > 0): ?>
<tableForumLst>
    <titleForumLst>Forum formations suivis</titleForumLst>

    <?php foreach($result as $row): ?>
        <threads>
            <a href="<?php echo("index.php?action=forumShow&id=".$row["formation_id"]); ?>">
                <?php echo(htmlspecialchars($row['name'])) ?>
            </a>
        </threads>
    <?php endforeach; ?>

</tableForumLst>
<?php else:?>
    <h1>Veuillez suivre une formation pour afficher son forum</h1>
<?php endif; ?>
