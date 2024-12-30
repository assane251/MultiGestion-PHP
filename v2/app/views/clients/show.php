<h1>Liste des clients</h1>
<a href="?controller=client&action=ajouterClientController">Ajouter un client</a>
<?php if (!empty($clients) && is_array($clients)): ?>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?php echo htmlspecialchars($client['id']); ?></td>
                <td><?php echo htmlspecialchars($client['nom']); ?></td>
                <td><?php echo htmlspecialchars($client['prenom']); ?></td>
                <td><?php echo htmlspecialchars($client['email']); ?></td>
                <td><?php echo htmlspecialchars($client['telephone']); ?></td>
                <td>
                    <a href="?controller=client&action=modifierClientController&id=<?php echo $client['id']; ?>">Éditer</a>
                    <a href="?controller=client&action=supprimerClientController&id=<?php echo $client['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Aucun client n'est enregistré.</p>
<?php endif; ?>
