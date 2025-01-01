<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<div class="text-center">
    <h1 class="text-2xl font-bold mb-6">Liste des clients</h1>
    <a href="?controller=client&action=ajouterClientController" class="text-blue-500 hover:underline mb-4 inline-block">Ajouter un client</a>
</div>

<?php if (!empty($clients) && is_array($clients)): ?>
    <table class="container mx-auto table-auto border-collapse border border-gray-200 shadow-sm">
        <thead>
        <tr class="bg-gray-100">
            <th class="border p-2">Id</th>
            <th class="border p-2">Nom</th>
            <th class="border p-2">Prénom</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Téléphone</th>
            <th class="border p-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clients as $client): ?>
            <tr class="even:bg-gray-50">
                <td class="border p-2 text-center"><?= htmlspecialchars($client['id']) ?></td>
                <td class="border p-2 text-center"><?= htmlspecialchars($client['nom']) ?></td>
                <td class="border p-2 text-center"><?= htmlspecialchars($client['prenom']) ?></td>
                <td class="border p-2 text-center"><?= htmlspecialchars($client['email']) ?></td>
                <td class="border p-2 text-center"><?= htmlspecialchars($client['telephone']) ?></td>
                <td class="border p-2 flex space-x-2">
                    <!-- Lien vers la page de détails du client -->
                    <a href="?controller=client&action=showClientController&id=<?= $client['id'] ?>" class="text-blue-500 hover:underline">Détails</a>
                    <a href="?controller=client&action=modifierClientController&id=<?= $client['id'] ?>" class="text-blue-500 hover:underline">Éditer</a>
                    <a href="?controller=client&action=supprimerClientController&id=<?= $client['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');" class="text-red-500 hover:underline">Supprimer</a>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="text-gray-600">Aucun client n'est enregistré.</p>
<?php endif; ?>