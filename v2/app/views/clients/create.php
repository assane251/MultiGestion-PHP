<h1>Ajouter un client</h1>

<form method="post" action="?controller=client&action=addClientController">
    <label for="name">Nom:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required>

    <button type="submit">Ajouter</button>
    <a href="?controller=client&action=listClientsController">Retour à la liste</a>
</form>