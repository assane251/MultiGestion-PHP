<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<h1 class="text-2xl font-bold mb-6 text-center">Liste des rendez-vous</h1>
<div class="text-center">
    <a href="?controller=rendezvous&action=ajouterRendezvousController" class="text-blue-500 hover:underline mb-4 inline-block">Ajouter un rendez-vous</a>
</div>

<?php if (!empty($rendezvous) && is_array($rendezvous)): ?>
    <table class="container mx-auto w-full table-auto border-collapse border border-gray-200 shadow-sm">
        <thead>
        <tr class="bg-gray-100">
            <th class="border p-2">Id</th>
            <th class="border p-2">Date rendez-vous</th>
            <th class="border p-2">Heure</th>
            <th class="border p-2">Description</th>
            <th class="border p-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rendezvous as $rv): ?>
            <tr class="even:bg-gray-50">
                <td class="border p-2 text-center"><?= htmlspecialchars($rv['id']) ?></td>
                <td class="border p-2 text-center"><?= htmlspecialchars($rv['date']) ?></td>
                <td class="border p-2 text-center"><?= htmlspecialchars($rv['heure']) ?></td>
                <td class="border p-2 text-center"><?= htmlspecialchars($rv['description']) ?></td>
                <td class="border p-2 text-center flex space-x-2 justify-center">
                    <!-- Lien vers la page de détails du rendez-vous -->
                    <a href="?controller=rendezvous&action=showRendezvousController&id=<?= $rv['id'] ?>" class="text-blue-500 hover:underline">Détails</a>
                    <a href="?controller=rendezvous&action=modifierRendezvousController&id=<?= $rv['id'] ?>" class="text-blue-500 hover:underline">Éditer</a>
                    <a href="?controller=rendezvous&action=supprimerRendezvousController&id=<?= $rv['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?');" class="text-red-500 hover:underline">Supprimer</a>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="text-gray-600">Aucun rendez-vous n'est disponible.</p>
<?php endif; ?>