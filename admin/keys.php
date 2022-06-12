<?php require'head_admin.php';

$co = connexion();

echo '<h3>Clé actuel</h3>';

$req='SELECT * FROM hash';

afficherKeys($co, $req);

?>

<br><br><br>

<a href="key_create.php">créer nouvelle clé (/!\ attention cela supprimera l'ancienne)</a>



