<?php require'head_admin.php';

$co = connexion();

?>

<div class="bg-light p-5 border rounded mh-10 d-flex flex-column align-items-center" style="margin: 150px 100px 50px 100px">
    <h3>Update imposteur</h3>

<form action="admin/update_imposteur.php" method="POST" class="w-50">
    <input class="form-control" placeholder="Le nom du nouveau suspect" type="text" name="nom" required><br>
    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
</form>

</div>

