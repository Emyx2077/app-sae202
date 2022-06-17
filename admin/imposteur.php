<?php require'head_admin.php';

$co = connexion();

echo '<h3>Imposteur actuel</h3>';

$req = 'SELECT * FROM suspect';

echo '<div class="bg-light m-5 p-5 border rounded mh-10 d-flex flex-column align-items-center">';
    showSuspect($co, $req);

    ?>
    <br>
    <a href="imposteur_update_form.php">/!\ cela supprimera l'ancien imposteur</a>
</div>

<?php require '../end.php';?>