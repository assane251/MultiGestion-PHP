<h1>Ajouter un client</h1>

<form method="post" action="?controller=client&action=ajouterClientController">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenom">Nom:</label>
    <input type="text" id="prenom" name="prenom" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="telephone">Telephone:</label>
    <input type="tel" id="telephone" name="telephone" required>

    <button type="submit">Ajouter</button>
    <a href="?controller=client&action=listClientsController">Retour à la liste</a>
</form>