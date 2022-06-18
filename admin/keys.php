<?php require'head_admin.php';

$co = connexion();

$req='SELECT * FROM hash';

echo '<div class="bg-light p-5 border rounded mh-10 d-flex flex-column align-items-center" style="margin: 150px 100px 50px 100px">';
echo '<h3>Clé actuel</h3>';

afficherKeys($co, $req);
echo '<a href="admin/key_create.php">créer nouvelle clé (/!\ attention cela supprimera l\'ancienne)</a>';
echo '</div>';

require '../end.php';
?>






