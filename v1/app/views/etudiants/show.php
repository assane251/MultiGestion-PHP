<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<?php if (!empty($etudiant)): ?>
    <h1 class="text-2xl font-bold text-center mt-6">Détails de l'Étudiant</h1>
    <div class="container mx-auto mt-4 p-6 bg-white rounded-lg shadow-md">
        <ul class="space-y-2">
            <li><strong>ID :</strong> <?= htmlspecialchars($etudiant['id']); ?></li>
            <li><strong>Nom :</strong> <?= htmlspecialchars($etudiant['nom']); ?></li>
            <li><strong>Prénom :</strong> <?= htmlspecialchars($etudiant['prenom']); ?></li>
            <li><strong>Email :</strong> <?= htmlspecialchars($etudiant['email']); ?></li>
            <li><strong>Filière :</strong> <?= htmlspecialchars($etudiant['filiere']); ?></li>
        </ul>
        <div class="mt-4">
            <a href="index.php?controller=etudiant&action=listEtudiantsController"
               class="text-blue-500 hover:underline">← Retour à la liste des étudiants</a>
        </div>
    </div>
<?php else: ?>
    <p class="text-red-500 text-center mt-4">⚠️ Aucun étudiant trouvé avec cet identifiant.</p>
<?php endif; ?>
