<h1>Liste des rendez-vous</h1>
<a href="?controller=rendezvous&action=ajouterRendezvousController">Ajouter un rendez-vous</a>
<?php if (!empty($rendezvous) && is_array($rendezvous)): ?>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Date rendez-vous</th>
        <th>Heure</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($rendezvous as $rv):?>
    <tr>
        <td><?php echo $rv['id'];?></td>
        <td><?php echo $rv['date'];?></td>
        <td><?php echo $rv['heure'];?></td>
        <td><?php echo $rv['description'];?></td>
        <td>
            <a href="?controller=rendezvous&action=modifierRendezvousController&id=<?php echo $rv['id'];?>">Editer</a>
            |
            <a href="?controller=rendezvous&action=supprimerRendezvousController&id=<?php echo $rv['id'];?>">Supprimer</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>

<?php else: ?>
    <p>Aucun rendez-vous n'est disponible.</p>
<?php endif;?>