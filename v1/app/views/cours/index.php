<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<h1 class="text-2xl font-bold text-center mt-3 mb-6">Liste des cours</h1>
<div class="text-center mb-4">
    <a href="?controller=cours&action=ajouterCoursController"
       class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-500 mb-4 inline-block">
        Ajouter un cours
    </a>
</div>

<?php if (!empty($courses) && is_array($courses)): ?>
    <table class="container mx-auto table-auto w-full border-collapse border border-gray-300 bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
        <tr class="bg-gray-200">
            <th class="border border-gray-300 px-4 py-2 text-left">Id</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Nom du cours</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Code du cours</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Nombre d'heures</th>
            <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($courses as $course): ?>
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 px-4 py-2"><?= $course['id']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $course['nom_cours']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $course['code_cours']; ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $course['nombre_heure']; ?></td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <a href="?controller=cours&action=listCoursParId&id=<?= $course['id']; ?>"
                       class="text-blue-500 hover:underline">Détails</a>

                    <a href="?controller=cours&action=modifierCoursController&id=<?= $course['id']; ?>"
                       class="text-blue-500 hover:underline">Éditer
                    </a>
                    |
                    <a href="?controller=cours&action=supprimerCoursController&id=<?= $course['id']; ?>"
                       class="text-red-500 hover:underline">Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="text-gray-700 text-center mt-4">Aucun cours n'est disponible.</p>
<?php endif; ?>