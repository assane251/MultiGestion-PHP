<h1>Ajouter un cours</h1>

<form method="post" action="?controller=cours&action=addCourseController">
    <label for="nom_cours">Nom du cours:</label>
    <input type="text" id="nom_cours" name="nom_cours" required>

    <label for="nombre_heure">Nombre d'heures:</label>
    <input type="number" id="nombre_heure" name="nombre_heure" required>

    <button type="submit">Ajouter</button>
    <a href="?controller=cours&action=listCoursesController">Retour à la liste</a>
</form>
