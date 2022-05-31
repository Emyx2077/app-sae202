<?php require'head.php';

$co = connexion();

$req = "SELECT * FROM teams ORDER BY teamLvl DESC";

afficherTeams($co, $req);
