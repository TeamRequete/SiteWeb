<headerBar>
    <a href="index.php">
        <h2>Team Requête</h2>
    </a>

    <menu>
        <div class="">
          <a id="btn_formation" href="index.php?action=formations">Formations</a>
        </div>
        <div class="">
          <a id="btn_moncul" href="index.php?action=mesFormation">MesFormation</a>
        </div>
        <div class="">
          <a id="btn_allo" href="#allo">allo</a>
        </div>
    </menu>

    <research>
        <input type="text" placeholder="Rechercher sur le site" />
        <button type="button">Rechercher</button>
    </research>

    <connect>
      <!-- TODO implementer le system de sessions -->
      <?php if(!isset($_SESSION['id'])): ?>
        <a href="index.php?action=login">Connexion</a>
        <a href="index.php?action=register">Inscription</a>
      <?php else: ?>
        <a href="index.php?action=profile"><?php echo(htmlspecialchars(getUserLogin($_SESSION['id']))); ?></a>
        <?php if(checkUserAdmin($_SESSION["id"]) === true): ?>
          <a href="index.php?action=admin">Administration</a>
        <?php endif; ?>
        <a href="index.php?action=deconnexion">Deconnexion</a>
      <?php endif; ?>
    </connect>
</headerBar>
