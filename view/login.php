<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <title>Team Requête</title>
</head>

<body>
    <header>
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
                <a href="login.html">Connexion</a>
                <a href="signin.html">Inscription</a>
            </connect>
        </headerBar>
    </header>

    <form>
        <h1>Connexion</h1>

        <label>Adresse mail</label>
        <input type="email" required/> <br>

        <label>Mot de passe</label>
        <input type="password" required/> <br>

        <button>Se connecter</button>
    </form>
</body>

</html>