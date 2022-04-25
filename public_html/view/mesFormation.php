<!-- a changer -->
<link href="view/css/mesFormations.css" rel="stylesheet" type="text/css">

<mesFormations>

  <!-- toutes les formations suivie -->
  <?php $result=dumpFollowFormation($_SESSION['id']); ?>
  <?php if($result->rowCount() > 0): ?>
  <h1>Formations suivies</h1>
  <listFormations>
    <?php foreach($result as $row): ?>
      <card>
        <a href="<?php echo("index.php?action=showFormation&id=".$row["formation_id"]); ?>">
          <img src="<?php if($row["filename"] !== '') echo("/uploads/".htmlspecialchars($row["filename"])); else echo("/uploads/default.jpg"); ?>" alt="">
            <cardTitle>
              <?php echo(htmlspecialchars($row["name"])); ?>
            </cardTitle>
        </a>
      </card>

    <?php endforeach; ?>
  </listFormations>
  <?php endif; ?>

  <?php if(dumpFollowFormation($_SESSION['id'])->rowCount() !== 0): ?>
    <hr id="lineSeparator">
  <?php endif; ?>

  <mesFormationsCreees>
    <h1>Mes formations créées</h1>

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
              <th>Delete</th>
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
              <th><a href="<?php echo("index.php?action=editFormation&id=".$row["formation_id"]."&delete=true"); ?>"><button type="submit" value="<?php echo($row['formation_id']); ?>">delete</button></a> </th>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php endif; ?>


      <form id="createFormationForm" method="post" action="index.php?action=mesFormation">
        <h1>Créer une formation</h1>
      <formFormation>
        <label>Nom</label>
        <input type="text" name="name" required/> <br>
        <button type="submit">Créer</button>
      </formFormation>
    </form>
  </mesFormationsCreees>

</mesFormations>
