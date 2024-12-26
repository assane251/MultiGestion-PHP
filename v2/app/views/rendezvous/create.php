<h1>Ajouter un rendez-vous</h1>

<form method="post" action="?controller=rendezvous&action=addRendezvousController">
    <label for="date">Date rendez-vous:</label>
    <input type="date" id="date" name="date" required>

    <label for="hours">Heure:</label>
    <input type="time" id="hours" name="hours" required>

    <label for="description"></label>
    <textarea id="description" name="description" required></textarea>

    <label for="client_id"></label>
    <select id="client_id" name="client_id" required>
        <option value="">Selectionnez un client</option>
        <?php foreach ($clients as $client):?>
            <option value="<?php echo $client['id'];?>"><?php echo $client['name'];?></option>
        <?php endforeach;?>
    </select>

    <button type="submit">Ajouter</button>
    <a href="?controller=rendezvous&action=listRendezvousController">Retour à la liste</a>
</form>
