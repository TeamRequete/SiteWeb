<!-- a changer -->
<link href="view/css/admin.css" rel="stylesheet" type="text/css">

<!-- toutes les formations du site -->
<?php $result=dumpFormation(); ?>
<?php if($result->rowCount() > 0): ?>
<table>
  <thead>
    <tr>
        <th>Image</th>
        <th>Nom</th>
        <th>Durée</th>
        <th>Date</th>
        <th>Show</th>
        <th>Follow</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $row): ?>
      <tr>
        <th> <img src="<?php if($row["filename"] !== '') echo("/uploads/".htmlspecialchars($row["filename"])); else echo("/uploads/default.jpg"); ?>" alt=""> </th>
        <th><?php echo(htmlspecialchars($row["name"])); ?></th>
        <th><?php echo(htmlspecialchars($row["duration"])); ?></th>
        <th><?php echo(htmlspecialchars($row["created_at"])); ?></th>
        <th><a href="<?php echo("index.php?action=showFormation&id=".$row["formation_id"]); ?>"><button type="submit" value="<?php echo($row['formation_id']); ?>">show</button></a> </th>
        <?php if(checkUserFormation($_SESSION['id'], $row["formation_id"])): ?>
          <th><a href="<?php echo("index.php?action=unFollowFormation&id=".$row["formation_id"]); ?>"><button type="submit" value="<?php echo($row['formation_id']); ?>">Unfollow</button></a> </th>
        <?php else: ?>
          <th><a href="<?php echo("index.php?action=followFormation&id=".$row["formation_id"]); ?>"><button type="submit" value="<?php echo($row['formation_id']); ?>">Follow</button></a> </th>
        <?php endif ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
