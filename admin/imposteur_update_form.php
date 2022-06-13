<?php require'head_admin.php';

$co = connexion();

?>

<form action="update_imposteur.php" method="POST">
    <input placeholder="Le nom du nouveau suspect" type="text" name="nom" required><br>
    <input placeholder="Le hash du suspect (ex : #2453)" type="text" name="hash" required><br>
    <input type="submit" value="Envoyer">
</form>

