<h1>Ajouter un etudiant</h1>

<form method="post" action="?controller=etudiants&action=addEtudiantController">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="filiere">Filière:</label>
    <input type="text" id="filiere" name="filiere" required>

    <button type="submit">Ajouter</button>
    <a href="?controller=etudiants&action=listEtudiantsController">Retour à la liste</a>
</form>