<!-- a changer -->
<link href="view/css/admin.css" rel="stylesheet" type="text/css">

<!-- toutes les formations du site -->
<?php $result=dumpFormation(); ?>
<?php if($result->rowCount() > 0): ?>
<table>
  <thead>
    <tr>
        <th>Nom</th>
        <th>Duree</th>
        <th>Date</th>
        <th>Show</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $row): ?>
      <tr>
        <th><?php echo(htmlspecialchars($row["name"])); ?></th>
        <th><?php echo(htmlspecialchars($row["duration"])); ?></th>
        <th><?php echo(htmlspecialchars($row["created_at"])); ?></th>
        <th><a href="<?php echo("index.php?action=showFormation&id=".$row["formation_id"]); ?>"><button type="submit" value="<?php echo($row['formation_id']); ?>">show</button></a> </th>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
