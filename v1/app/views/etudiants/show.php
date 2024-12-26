<h1>Liste des etudiants</h1>
<a href="?controller=cours&action=addEtudiantController">Ajouter un etudiant</a>
<?php if (!empty($etudiants) && is_array($etudiants)): ?>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Filiere</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($etudiants as $etudiant):?>
    <tr>
        <td><?php echo $etudiant['id'];?></td>
        <td><?php echo $etudiant['nom'];?></td>
        <td><?php echo $etudiant['prenom'];?></td>
        <td><?php echo $etudiant['email'];?></td>
        <td><?php echo $etudiant['filiere'];?></td>
        <td>
            <a href="?controller=etudiants&action=editEtudiantController&id=<?php echo $etudiant['id'];?>">Editer</a>
            <a href="?controller=etudiants&action=deleteEtudiantController&id=<?php echo $etudiant['id'];?>">Supprimer</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>
<?php else: ?>
    <p>Aucun etudiant n'est enregistré.</p>
<?php endif;?>