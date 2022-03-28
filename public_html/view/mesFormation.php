<!-- a changer -->
<link href="view/css/admin.css" rel="stylesheet" type="text/css">

<form method="post" action="index.php?action=mesFormation">
    <h1>Crée formation</h1>

    <label>Nom</label>
    <input type="text" name="name" required/> <br>

    <button type="submit">Crée</button>
</form>


<!-- formation crée -->
<?php $result=dumpUserFormation($_SESSION["id"]); ?>
<?php if($result->rowCount() > 0): ?>
<table>
  <thead>
    <tr>
        <th>Nom</th>
        <th>Duree</th>
        <th>Date</th>
        <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $row): ?>
      <tr>
        <th><?php echo(htmlspecialchars($row["name"])); ?></th>
        <th><?php echo(htmlspecialchars($row["duration"])); ?></th>
        <th><?php echo(htmlspecialchars($row["created_at"])); ?></th>
        <th><a href="<?php echo("index.php?action=editFormation&id=".$row["formation_id"]); ?>"><button type="submit" value="<?php echo($row['formation_id']); ?>">edit</button></a> </th>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
