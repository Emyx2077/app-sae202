<?php require'head_admin.php';

$co = connexion();

$req ="SELECT * FROM teams";

echo '<h3>Toutes les teams</h3>';

afficherTeams($co, $req);

