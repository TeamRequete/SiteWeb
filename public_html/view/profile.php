<link href="css/profile.css" rel="stylesheet" type="text/css">


<?php
  $email = getUserEmail($_SESSION['id']);
  $login = getUserLogin($_SESSION['id']);
?>

<link href="view/css/profile.css" rel="stylesheet" type="text/css">

<form id="formProfile" action="index.php?action=profile" method="post">
    <h1>Profile</h1>

    <label>Adresse mail</label>
    <input type="email" name="email" value="<?php echo(htmlentities($email)); ?>" required/> <br>

    <label>Vérifier adresse mail</label>
    <input type="email" value="<?php echo(htmlentities($email)); ?>" required/> <br>

    <label>Username</label>
    <input type="text" name="username" placeholder="UserName" value="<?php echo(htmlentities($login)); ?>" required/><br>

    <label>Mot de passe actuelle</label>
    <input type="password" name="last_pass" required/><br>

    <label>Nouveau mot de passe</label>
    <input type="password" name="pass" /><br>

    <label>Vérifier nouveau mot de passe</label>
    <input type="password" /><br>

    <button type="submit" hidden>Commit</button>
</form>


<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript" src="js/formCheckerProfile.js" ></script>
