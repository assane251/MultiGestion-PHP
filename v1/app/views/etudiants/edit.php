<?php if (!empty($etudiant)): ?>
<h1>Modifier l'etudiant <?= $etudiant['id'] ?></h1>

<form action="?controller=etudiants&action=editEtudiantController" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($etudiant['id']); ?>">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($etudiant['nom']); ?>" required>

    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($etudiant['email']); ?>" required>

    <label for="filiere">Filière:</label>
    <input type="text" id="filiere" name="filiere" value="<?php echo htmlspecialchars($etudiant['filiere']); ?>" required>

    <button type="submit">Modifier</button>
    <a href="?controller=etudiants&action=listEtudiantsController">Retour à la liste</a>
</form>
<?php endif; ?>