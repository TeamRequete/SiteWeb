<table>
   <tr>
      <th>ID</th>
      <th>user_login</th>
      <th>user_email</th>
      <th>role</th>
      <th>created_at</th>
      <th>promote</th>
      <th>reset password</th>
      <th>new password</th>
   </tr>
   <?php foreach(dumpUser() as $row): ?>
   <tr>
     <form method="post" action="index.php?action=admin" id="<?php echo('form_promote'.$row['ID']); ?>"></form>
     <form method="post" action="index.php?action=admin" id="<?php echo('form_newpass'.$row['ID']); ?>"></form>
     <th><?php echo($row['ID']); ?></th>
     <th><?php echo($row['user_login']); ?></th>
     <th><?php echo($row['user_email']); ?></th>
     <th><?php echo($row['role']); ?></th>
     <th><?php echo($row['created_at']); ?></th>
     <th> <button form="<?php echo('form_promote'.$row['ID']); ?>" type="promote" name="promote" value="<?php echo($row['ID']); ?>" submit>promote</button> </th>
     <th> <button class="b_newpass" form="<?php echo('form_newpass'.$row['ID']); ?>" type="update" submit>update</button> </th>
     <th> <input class="newpass" form="<?php echo('form_newpass'.$row['ID']); ?>" type="text" name="new_pass" value=""> </th>
   </tr>
 <?php endforeach; ?>
</table>

<script type="text/javascript" src="view/js/jquery.js" ></script>
<script type="text/javascript" src="view/js/formCheckerAdmin.js" ></script>
