<!-- a changer -->
<link href="view/css/admin.css" rel="stylesheet" type="text/css">
<link href="view/css/showFormation.css" rel="stylesheet" type="text/css">

<!-- Affiche la formations -->
<?php $stmt=getFormation($_GET['id'])->fetch(); ?>

<h1><?php echo(htmlspecialchars($stmt['name'])); ?></h1>
<h2>La formation dure: <?php echo(htmlspecialchars($stmt['duration'])); ?></h2>
<br>
<br>
<showFormation><?php echo(buildMarkdown($stmt['content'])); ?></showFormation>
