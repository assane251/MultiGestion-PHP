<?php if (!empty($client)): ?>
<h1>Modifier le client <?= $client['id'] ?></h1>

<form action="?controller=client&action=modifierClientController" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($client['id']); ?>">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($client['nom']); ?>" required>

    <label for="prenom">Prenom:</label>
    <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($client['prenom']); ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($client['email']); ?>" required>

    <label for="telephone">Telephone:</label>
    <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($client['telephone']); ?>" required>

    <button type="submit">Modifier</button>
    <a href="?controller=client&action=listClientsController">Retour à la liste</a>
</form>
<?php endif; ?>