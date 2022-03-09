<headerBar>
    <a href="index.php">
        <h2>Team Requête</h2>
    </a>

    <menu>
        <div class="">
          <a id="btn_formation" href="#formation">Formations</a>
        </div>
        <div class="">
          <a id="btn_moncul" href="#moncul">moncul</a>
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
        <a href="index.php?action=profile"><?php echo(getUserLogin($_SESSION['id'])); ?></a> <!-- mettre le username du pélo -->
        <a href="index.php?action=deconnexion">Deconnexion</a>
      <?php endif; ?>
    </connect>
</headerBar>
