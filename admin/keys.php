<?php require'head_admin.php';

$co = connexion();

$req='SELECT * FROM hash';

echo '<div class="bg-light m-5 p-5 border rounded mh-10 d-flex flex-column align-items-center">';
echo '<h3>Clé actuel</h3>';

afficherKeys($co, $req);
echo '<a href="admin/key_create.php">créer nouvelle clé (/!\ attention cela supprimera l\'ancienne)</a>';
echo '</div>';

require '../end.php';
?>






