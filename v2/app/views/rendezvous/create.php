<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Ajouter un rendez-vous</h1>

        <form method="post" action="?controller=rendezvous&action=ajouterRendezvousController" class="space-y-4">
            <div>
                <label for="date" class="block font-medium mb-1">Date rendez-vous:</label>
                <input type="date" id="date" name="date" required class="border rounded-lg w-full p-2">
            </div>

            <div>
                <label for="heure" class="block font-medium mb-1">Heure:</label>
                <input type="time" id="heure" name="heure" required class="border rounded-lg w-full p-2">
            </div>

            <div>
                <label for="description" class="block font-medium mb-1">Description:</label>
                <textarea id="description" name="description" required class="border rounded-lg w-full p-2"></textarea>
            </div>

            <div>
                <label for="client_id" class="block font-medium mb-1">Client associé:</label>
                <select id="client_id" name="client_id" required class="border rounded-lg w-full p-2">
                    <option value="">Sélectionnez un client</option>
                    <?php foreach ($clients as $client): ?>
                        <option value="<?= $client['id'] ?>"><?= htmlspecialchars($client['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter</button>
                <a href="?controller=rendezvous&action=listRendezvousController" class="text-blue-500 hover:underline">Retour à la liste</a>
            </div>
        </form>
    </div>
</div>