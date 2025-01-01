<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<h1 class="text-2xl font-bold text-center mt-3 mb-6">Liste des étudiants</h1>

<div class="text-center mb-4">
    <a href="?controller=etudiant&action=ajouterEtudiantController"
       class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-500">
        Ajouter un étudiant
    </a>
</div>

<?php if (!empty($etudiants) && is_array($etudiants)): ?>
    <table class="container mx-auto table-auto w-full border-collapse border border-gray-300 bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
        <tr class="bg-gray-200">
            <th class="border border-gray-300 px-4 py-2 text-left">Id</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Nom</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Prénom</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Filière</th>
            <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($etudiants as $etudiant): ?>
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 px-4 py-2"><?= $etudiant['id']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $etudiant['nom']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $etudiant['prenom']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $etudiant['email']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $etudiant['filiere']; ?></td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <a href="?controller=etudiant&action=listEtudiantParId&id=<?= $etudiant['id']; ?>"
                       class="text-blue-500 hover:underline">Détails
                    </a>

                    <a href="?controller=etudiant&action=modifierEtudiantController&id=<?= $etudiant['id']; ?>"
                       class="text-blue-500 hover:underline">Éditer
                    </a>
                    |
                    <a href="?controller=etudiant&action=supprimerEtudiantController&id=<?= $etudiant['id']; ?>"
                       class="text-red-500 hover:underline">Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="text-gray-700 text-center mt-4">Aucun étudiant enregistré.</p>
<?php endif; ?>