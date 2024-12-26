<?php if (!empty($rendezvous)): ?>
<h1>Modifier un rendez-vous <?= $rendezvous['id'] ?></h1>

<form action="?controller=rendezvous&action=editRendezvousController" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($rendezvous['id']) ?>">
    <label for="date">Date rendez-vous:</label>
    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($rendezvous['date']); ?>" required>

    <label for="hours">Heure:</label>
    <input type="time" id="hours" name="hours" value="<?php echo htmlspecialchars($rendezvous['hours']); ?>" required>

    <label for="description"></label>
    <textarea id="description" name="description" required><?php echo htmlspecialchars($rendezvous['description']);?></textarea>

    <label for="client_id"></label>
    <select id="client_id" name="client_id" required>
        <option value="">Selectionnez un client</option>
        <?php foreach ($clients as $client):?>
            <option value="<?php echo $client['id'];?>" <?php echo ($client['id'] == $rendezvous['client_id'])?'selected':'';?>><?php echo $client['name'];?></option>
        <?php endforeach;?>
    </select>

    <button type="submit">Modifier</button>
    <a href="?controller=rendezvous&action=listRendezvousController">Retour à la liste</a>
</form>
<?php endif; ?>