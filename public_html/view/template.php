<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/css/main.css" rel="stylesheet" type="text/css">
    <link href="view/css/listFormations.css" rel="stylesheet" type="text/css">
    <link href="view/css/profile.css" rel="stylesheet" type="text/css">
    <?php if(isset($_SESSION['style']) && $_SESSION['style'] === true): ?>
      <link href="view/css/headerBar2.css" rel="stylesheet" type="text/css">
    <?php else: ?>
      <link href="view/css/headerBar1.css" rel="stylesheet" type="text/css">
    <?php endif; ?>
    <title>Team Requête</title>
</head>

<body>
  <switchChangeStyle>
    <h3>Changer style site</h3>
    <label class="switch">
      <?php if(isset($_SESSION['style']) && $_SESSION['style'] === true): ?>
        <input onclick="switchStyle();" type="checkbox" checked>
      <?php else: ?>
        <input onclick="switchStyle();" type="checkbox">
      <?php endif; ?>
      <span class="slider round"></span>
    </label>
  </switchChangeStyle>
    <header>
      <?php echo "$header_bar" ?>
    </header>
    <bodyContent>
      <?php echo $content ?>
    </bodyContent>


  <footer>
    © 2022 Team-Requete
  </footer>

</body>




<script type="text/javascript" src="view/js/jquery.js" ></script>
<script type="text/javascript" src="view/js/changeStyle.js" ></script>

</html>
