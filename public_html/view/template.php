<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/listFormations.css" rel="stylesheet" type="text/css">
    <link href="css/profile.css" rel="stylesheet" type="text/css">
    <?php if(isset($_SESSION['style']) && $_SESSION['style'] === true): ?>
      <link href="css/headerBar2.css" rel="stylesheet" type="text/css">
    <?php else: ?>
      <link href="css/headerBar1.css" rel="stylesheet" type="text/css">
    <?php endif; ?>
    <title>Team Requête</title>
</head>

<body>
  
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




<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript" src="js/changeStyle.js" ></script>

</html>
