<?php require'head_admin.php';

$co = connexion();

?>

<form action="admin/update_imposteur.php" method="POST">
    <input placeholder="Le nom du nouveau suspect" type="text" name="nom" required><br>
    <input type="submit" value="Envoyer">
</form>

