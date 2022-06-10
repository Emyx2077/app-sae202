<?php require'head_admin.php';

$co = connexion();

echo 'clé actuel';

$req='SELECT * FROM hash';

$hashKey = afficherKeys($co, $req);

echo $hashKey;

?>

<br><br><br>

<a href="key_create.php">créer nouvelle clé (/!\ attention cela supprimera l'ancienne)</a>



