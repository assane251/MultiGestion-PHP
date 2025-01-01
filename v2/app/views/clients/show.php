<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<div class="text-center">
    <h1 class="text-2xl font-bold mb-6">Détails du client</h1>
    <a href="?controller=client&action=listClientsController" class="text-blue-500 hover:underline mb-4 inline-block">Retour à la liste des clients</a>
</div>

<?php if ($client): ?>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <p><strong>Nom :</strong> <?= htmlspecialchars($client['nom']) ?></p>
        <p><strong>Prénom :</strong> <?= htmlspecialchars($client['prenom']) ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($client['email']) ?></p>
        <p><strong>Téléphone :</strong> <?= htmlspecialchars($client['telephone']) ?></p>
    </div>
<?php else: ?>
    <p class="text-gray-600">Client non trouvé.</p>
<?php endif; ?>
