<?php require'head.php';

$co = connexion();

$req ="SELECT * FROM teams";

afficherTeams($co, $req);