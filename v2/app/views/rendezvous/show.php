<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<div class="text-center">
    <h1 class="text-2xl font-bold mb-6">Détails du rendez-vous</h1>
    <a href="?controller=rendezvous&action=listRendezvousController" class="text-blue-500 hover:underline mb-4 inline-block">Retour à la liste des rendez-vous</a>
</div>

<?php if ($rendezvous): ?>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <p><strong>Date :</strong> <?= htmlspecialchars($rendezvous['date']) ?></p>
        <p><strong>Heure :</strong> <?= htmlspecialchars($rendezvous['heure']) ?></p>
        <p><strong>Description :</strong> <?= htmlspecialchars($rendezvous['description']) ?></p>
        <p><strong>Client :</strong> <?= htmlspecialchars($rendezvous['client_nom']) ?> <?= htmlspecialchars($rendezvous['client_prenom']) ?></p>
    </div>
<?php else: ?>
    <p class="text-gray-600">Rendez-vous non trouvé.</p>
<?php endif; ?>
