<h1>Ajouter un rendez-vous</h1>

<form method="post" action="?controller=rendezvous&action=ajouterRendezvousController">
    <label for="date">Date rendez-vous:</label>
    <input type="date" id="date" name="date" required>

    <label for="heure">Heure:</label>
    <input type="time" id="heure" name="heure" required>

    <label for="description"></label>
    <textarea id="description" name="description" required></textarea>

    <label for="client_id"></label>
    <select id="client_id" name="client_id" required>
        <option value="">Selectionnez un client</option>
        <?php foreach ($clients as $client):?>
            <option value="<?php echo $client['id'];?>"><?php echo $client['nom'];?></option>
        <?php endforeach;?>
    </select>

    <button type="submit">Ajouter</button>
    <a href="?controller=rendezvous&action=listRendezvousController">Retour à la liste</a>
</form>
