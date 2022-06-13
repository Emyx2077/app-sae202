<?php require'head_admin.php';

$co = connexion();

echo '<h3>Imposteur actuel</h3>';

$req = 'SELECT * FROM suspect';

showSuspect($co, $req);

?>
<br>
<a href="imposteur_update_form.php">/!\ cela supprimera l'ancien imposteur</a>