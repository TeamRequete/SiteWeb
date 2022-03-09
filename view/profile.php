<?php
  $email = getUserEmail($_SESSION['id']);
  $login = getUserLogin($_SESSION['id']);
?>

<form id="formProfile" action="index.php?action=profile" method="post">
    <h1>Profile</h1>

    <label>Adresse mail</label>
    <input type="email" name="email" value="<?php echo($email); ?>" required/> <br>

    <label>Vérifier adresse mail</label>
    <input type="email" value="<?php echo($email); ?>" required/> <br>

    <label>Username</label>
    <input type="text" name="username" placeholder="UserName" value="<?php echo($login); ?>" required/><br>

    <label>Mot de passe actuelle</label>
    <input type="password" name="last_pass" required/><br>

    <label>Nouveau mot de passe</label>
    <input type="password" name="pass" /><br>

    <label>Vérifier nouveau mot de passe</label>
    <input type="password" /><br>

    <button type="submit" hidden>Commit</button>
</form>

<script type="text/javascript" src="view/js/jquery.js" ></script>
<script type="text/javascript" src="view/js/formCheckerProfile.js" ></script>
