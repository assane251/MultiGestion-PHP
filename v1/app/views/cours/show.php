<?php if (!empty($course)): ?>
<h1>Details Cours <?php echo 'hello'; ?></h1>
<ul>
    <li>Nom cours: <?php echo $course['nom_cours']; ?></li>
    <li>Code cours: <?php $course['code_cours']; ?></li>
    <li>Nombre d'heure: <?php $course['nombre_heure']; ?></li>
    <li><a href="">Retourner liste</a></li>
</ul>
<?php endif ;?>

