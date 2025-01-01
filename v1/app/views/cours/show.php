<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<div class="max-w-4xl mx-auto mt-10 bg-white shadow-md rounded-lg overflow-hidden p-6">
    <?php if (!empty($course)): ?>
        <h1 class="text-2xl font-bold mb-4">Détails du Cours</h1>
        <ul class="space-y-2">
            <li><strong>📝 Nom du cours :</strong> <?= htmlspecialchars($course['nom_cours']); ?></li>
            <li><strong>🔑 Code du cours :</strong> <?= htmlspecialchars($course['code_cours']); ?></li>
            <li><strong>⏱️ Nombre d'heures :</strong> <?= htmlspecialchars($course['nombre_heure']); ?></li>
        </ul>
        <div class="mt-6 text-center">
            <a href="index.php?controller=cours&action=listCoursController"
               class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">
                ← Retour à la liste des cours
            </a>
        </div>
    <?php else: ?>
        <p class="text-red-500">⚠️ Aucun cours trouvé avec cet identifiant.</p>
    <?php endif; ?>
</div>
