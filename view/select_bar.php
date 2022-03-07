<headerBar>
    <a href="index.html">
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
      <?php if(false !== true): ?>
        <a href="login.html">Connexion</a>
        <a href="signin.html">Inscription</a>
      <?php else: ?>
        <a href="login.html">kevin</a> <!-- mettre le username du pélo -->
        <a href="signin.html">Deconnexion</a>
      <?php endif; ?>
    </connect>
</headerBar>
