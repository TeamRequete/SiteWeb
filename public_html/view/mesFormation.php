<!-- a changer -->
<link href="view/css/admin.css" rel="stylesheet" type="text/css">




<!-- toutes les formations suivie -->
<?php $result=dumpFollowFormation($_SESSION['id']); ?>
<?php if($result->rowCount() > 0): ?>
<h1>Formations suivies</h1>
<table>
  <thead>
    <tr>
        <th>Image</th>
        <th>Nom</th>
        <th>Durée</th>
        <th>Date</th>
        <th>Show</th>
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
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

<br/>
<br/>
<br/>

<form id="createFormationForm" method="post" action="index.php?action=mesFormation">
    <h1>Créer formation</h1>
  <formFormation>
    <label>Nom</label>
    <input type="text" name="name" required/> <br>
    <button type="submit">Créer</button>
  </formFormation>
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
        <th>Nombre de Follow</th>
        <th>Nombre de upvote</th>
        <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $row): ?>
      <tr>
        <th><?php echo(htmlspecialchars($row["name"])); ?></th>
        <th><?php echo(htmlspecialchars($row["duration"])); ?></th>
        <th><?php echo(htmlspecialchars($row["created_at"])); ?></th>
        <th><?php echo(getFollowFormation($row["formation_id"])); ?></th>
        <th><?php echo(getVoteFormation($row["formation_id"])); ?></th>
        <th><a href="<?php echo("index.php?action=editFormation&id=".$row["formation_id"]); ?>"><button type="submit" value="<?php echo($row['formation_id']); ?>">edit</button></a> </th>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
