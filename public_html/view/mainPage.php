<link href="css/mainPage.css" rel="stylesheet" type="text/css">



<mainPage>
    <contentTopPage>
        <textImageCenter>Site de formations de la Team Requête</textImageCenter>
        <img src="images/im.jpg" alt="imgTeamRequete"></img>
        <contentPresentation>
            <contents>
                <div class="content div1">A remplir avec du texte <br> balise 1</div>
                <div class="content div2">A remplir avec du texte <br> balise 2</div>
                <div class="content div3">A remplir avec du texte <br> balise 3</div>

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
