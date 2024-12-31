<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<h1 class="text-2xl font-bold text-center mt-3 mb-6">Ajouter un cours</h1>

<form method="post" action="?controller=cours&action=ajouterCoursController" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    <div class="mb-4">
        <label for="nom_cours" class="block text-gray-700 font-medium mb-2">Nom du cours:</label>
        <input
                type="text"
                id="nom_cours"
                name="nom_cours"
                required
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
    </div>

    <div class="mb-4">
        <label for="code_cours" class="block text-gray-700 font-medium mb-2">Code du cours:</label>
        <input
                type="text"
                id="code_cours"
                name="code_cours"
                required
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
    </div>

    <div class="mb-4">
        <label for="nombre_heure" class="block text-gray-700 font-medium mb-2">Nombre d'heures:</label>
        <input
                type="number"
                id="nombre_heure"
                name="nombre_heure"
                required
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
    </div>

    <div class="flex items-center justify-between">
        <button
                type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
            Ajouter
        </button>
        <a
                href="?controller=cours&action=listCoursController"
                class="text-blue-500 hover:underline"
        >
            Retour à la liste
        </a>
    </div>
</form>