<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<div class="container mx-auto">
    <h1 class="text-2xl font-bold my-6">Ajouter un client</h1>

    <form method="post" action="?controller=client&action=ajouterClientController" class="space-y-4">
        <div>
            <label for="nom" class="block font-medium mb-1">Nom:</label>
            <input type="text" id="nom" name="nom" required class="border rounded-lg w-full p-2">
        </div>

        <div>
            <label for="prenom" class="block font-medium mb-1">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required class="border rounded-lg w-full p-2">
        </div>

        <div>
            <label for="email" class="block font-medium mb-1">Email:</label>
            <input type="email" id="email" name="email" required class="border rounded-lg w-full p-2">
        </div>

        <div>
            <label for="telephone" class="block font-medium mb-1">Téléphone:</label>
            <input type="tel" id="telephone" name="telephone" required class="border rounded-lg w-full p-2">
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter</button>
            <a href="?controller=client&action=listClientsController" class="text-blue-500 hover:underline">Retour à la liste</a>
        </div>
    </form>
</div>