<link href="css/signin.css" rel="stylesheet" type="text/css">


<form id="formRegister" action="index.php?action=register" method="post">
    <h1>Inscription</h1>

    <label>Adresse mail</label>
    <input type="email" placeholder="test@example.com" name="email" required/> <br>

    <label>Vérifier adresse mail</label>
    <input type="email" placeholder="test@example.com" required/><br>

    <label>Username</label>
    <input type="text" name="username" placeholder="UserName" required/><br>

    <label>Mot de passe</label>
    <input type="password" name="pass" required/><br>

    <label>Vérifier mot de passe</label>
    <input type="password" required/><br> Accepter les <a href="">condtions d'utilisation</a>
    <input type="checkbox"/><br>

    <button type="submit" hidden>S'inscrire</button>
</form>

<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript" src="js/formChecker.js" ></script>
