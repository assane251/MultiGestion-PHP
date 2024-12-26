<h1>Liste des cours</h1>
<a href="?controller=cours&action=addCourseController">Ajouter un cours</a>
<?php if (!empty($courses) && is_array($courses)): ?>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Nom du cour</th>
        <th>Nombre d'heure</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($courses as $course):?>
    <tr>
        <td><?php echo $course['id'];?></td>
        <td><?php echo $course['nom_cours'];?></td>
        <td><?php echo $course['nombre_heure'];?></td>
        <td>
            <a href="?controller=cours&action=editCourseController&id=<?php echo $course['id'];?>">Editer</a>
            |
            <a href="?controller=cours&action=deleteCourseController&id=<?php echo $course['id'];?>">Supprimer</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>

<?php else: ?>
    <p>Aucun cours n'est disponible.</p>
<?php endif;?>