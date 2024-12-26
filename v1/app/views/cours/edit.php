<?php if (!empty($course)): ?>
<h1>Modifier le cours <?= $course['id'] ?></h1>

<form action="?controller=cours&action=editCourseController" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($course['id']) ?>">
    <label for="nom_cours">Nom du cours:</label>
    <input type="text" id="nom_cours" name="nom_cours" value="<?php echo htmlspecialchars($course['nom_cours']); ?>" required>

    <label for="nombre_heure">Nombre d'heures:</label>
    <input type="number" id="nombre_heure" name="nombre_heure" value="<?php echo htmlspecialchars($course['nombre_heure']); ?>" required>

    <button type="submit">Modifier</button>
    <a href="?controller=cours&action=listCoursesController">Retour à la liste</a>
</form>
<?php endif; ?>