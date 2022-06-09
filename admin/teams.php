<?php require'head_admin.php';

$co = connexion();

$req ="SELECT * FROM teams";

afficherTeams($co, $req);

