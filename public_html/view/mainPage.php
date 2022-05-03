<link href="css/mainPage.css" rel="stylesheet" type="text/css">



<mainPage>
    <contentTopPage>
        <textImageCenter>Site de formations de la Team Requête</textImageCenter>
        <img src="images/photoTeamRequete.jpg" alt="imgTeamRequete"></img>
        <contentPresentation>
            <contents>
                <div class="content div1">Bienvenue sur le site de formation de la Team Requête ! Sur ce site vous trouverez toutes les formations créées par et pour des passionnés.</div>
                <div class="content div2">La première chose à faire une fois que vous êtes connecté est de lire ou de publier une formation. Pour cela, vous pouvez soit aller sur Formations pour voir les formations déjà publiées, soit Mes Formations afin d’ajouter la votre.</div>
                <div class="content div3">Respectez les règles de politesse et de bienveillance. Les administrateurs se réservent le droit de vous bannir du site en cas de non-respect, propos injurieux, ou publication de formation inappropriée.</div>

            </contents>
            <buttonsContent>
                <button type="button" id="btnBefore" onclick="before()"></button>
                <button type="button" id="btnAfter" onclick="after()"></button>
            </buttonsContent>
        </contentPresentation>
    </contentTopPage>

    <hr id="lineSeparator">

    <topFormations>
        <h1>Les meilleurs formations</h1>
    </topFormations>


    <listFormations>
    <?php foreach(dumpMostLikedFormation() as $row): ?>
    <card>
        <a href="<?php echo("index.php?action=showFormation&id=".$row['formation_id']) ?>">
          <?php if( empty($row['filename']) ): ?>
            <img src="/uploads/default.jpg"></img>
          <?php else: ?>
            <img src="<?php echo("/uploads/".$row['filename']); ?>"></img>
          <?php endif; ?>


            <cardTitle>
                <?php echo(htmlspecialchars($row['name'])); ?>
            </cardTitle>

        </a>
    </card>
    <?php endforeach; ?>

</listFormations>
</mainPage>




<script src="js/jquery.js"></script>
<script src="js/presentationButtonsAnimations.js"></script>
