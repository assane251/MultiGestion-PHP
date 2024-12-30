<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/../navbar.php'; ?>

<?php if (!empty($etudiant)): ?>
    <h1 class="text-2xl font-bold text-center mt-2 mb-6">Modifier l'étudiant <?= $etudiant['id'] ?></h1>

    <form action="?controller=etudiant&action=modifierEtudiantController" method="post" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <input type="hidden" name="id" value="<?= htmlspecialchars($etudiant['id']); ?>">

        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-medium mb-2">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($etudiant['nom']); ?>" required
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="prenom" class="block text-gray-700 font-medium mb-2">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($etudiant['prenom']); ?>" required
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($etudiant['email']); ?>" required
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="filiere" class="block text-gray-700 font-medium mb-2">Filière:</label>
            <input type="text" id="filiere" name="filiere" value="<?= htmlspecialchars($etudiant['filiere']); ?>" required
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Modifier
            </button>
            <a href="?controller=etudiant&action=listEtudiantsController" class="text-gray-700 hover:underline">Retour à la liste</a>
        </div>
    </form>
<?php endif; ?>